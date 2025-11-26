<?php

namespace App\Http\Controllers\front;

use App\Models\User;
use App\Models\Student;
use App\Models\StudentDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Validator;
use Carbon\Carbon;

class ProfileController extends FrontController
{
    public function __construct() {
        parent::__construct();
    }

    public function dashboard(Request $request) {
        if ($request->isMethod('post')) {
            $search         = $request->search;
            $start          = intval($request->start);
            $length         = intval($request->length);
            $order          = $request->order;
            $column_array = [
                'id',
                'firstname',
                'email',
                'citizenship',
                'country_id',
                'course',
                'program_level_id',
            ];
    
            $order_field	= 'students.id';
            $order_sort  	= 'DESC';

            $param['select'] = [
                'students.*',
                'countries.name AS country_name',
                'program_levels.name AS program_name'
            ];
            $param['join'] = [
                [
                    'table'     => 'countries',
                    'field1'    => 'students.country_id',
                    'operation' => '=',
                    'field2'    => 'countries.id',
                    'type'      => 'left'
                ],
                [
                    'table'     => 'program_levels',
                    'field1'    => 'students.program_level_id',
                    'operation' => '=',
                    'field2'    => 'program_levels.id',
                    'type'      => 'left'
                ]
            ];
            $param['where'] = [
                'students.agent_code' => $this->login_user->referral_code
            ];
    

            if (!empty($order)) {
                if (isset($order[0]['column']) && $order[0]['column'] != '') {
                    $order_field = $column_array[$order[0]['column']];
                    $order_sort  = $order[0]['dir'];
                }
            }
            $param['orderby']   = array('field' => $order_field, 'order' => $order_sort);

            $total_rows = $filter_count = Student::get_data($param, true);

            if (isset($request->search['value']) && $request->search['value'] !== '') {
                $search = $request->search['value'];
                $param['or_where'] = [
                    'students.firstname'       => $search,
                    'students.email'           => $search,
                    'students.citizenship'     => $search,
                    'students.course'          => $search,
                    'countries.name'           => $search,
                    'program_levels.name'      => $search,
                ];
                $filter_count = Student::get_data($param, true);
            }
    
            $param['limit']     = array('take' => $length, 'skip' => $start);
            $records            = Student::get_data($param);

            $clients   = array();

            foreach ($records as $row) {
                $row_data           	        = array();
                $row_data['id']	                = $row->id;
                $row_data['name']               = $row->fullname;
                $row_data['email'] 	            = $row->email;
                $row_data['citizenship']        = $row->citizenship;
                $row_data['country_id'] 	    = $row->country->name;
                $row_data['course'] 	        = $row->course;
                $row_data['program_level_id']   = $row->program->name;
                $row_data['action']             = "<a class='btn btn-primary' href=" . agent_url('profile/student-document/'.encreptIt($row->id)) . ">View Letter</a>";

                $clients[]            	        = $row_data;
            }

            $data['recordsTotal']       = $total_rows;
            $data['recordsFiltered']    = $filter_count;
            $data['data']               = $clients;

            json_output($data);
        }
        return view('front.profile.dashboard', $this->data);
    }

    public function index() {

        $this->data['css_files'] = array(
            'css/fileupload.css',
        );
        $this->data['js_files'] = array(
            'js/dropify.js',
        );

        return view('front.profile.index', $this->data);
    }

    public function setup() {

        $this->data['css_files'] = array(
            'css/fileupload.css',
            'css/bootstrap-tagsinput.css',
            'css/bootstrap-datepicker.css',
        );
        $this->data['js_files'] = array(
            'js/dropify.js',
            'js/bootstrap-datepicker.js',
            'js/bootstrap-tagsinput.min.js',
        );

        return view('front.profile.setup', $this->data);
    }

    public function update_profile(Request $request) {
        if ($request->isMethod('post')) {
            $validation_array = [
                'firstname'     => 'required',
                'lastname'      => 'required',
                'email'         => 'email|required|unique:users,email,'.$this->login_user->id,
                'phone'         => 'required',
            ];
            $validator = Validator::make($request->all(), $validation_array);
            if ($validator->passes()) {
                if ($this->login_user->id > 0) {
                    $user_id    = $this->login_user->id;
                    $employee   = User::where('id', $user_id)->first();

                    $date       = str_replace('/', '-', $request->birthdate);
                    $new_date   = date("Y-m-d", strtotime($date));

                    $user_data  = array (
                        'firstname'     => $request->firstname,
                        'lastname'      => $request->lastname,
                        'email'         => strtolower($request->email),
                        'phone'         => $request->phone,
                    );

                    if($request->password == '') {
                        unset($user_data['password']);
                    }
                    User::where('id', $user_id)->update($user_data);

                    if ($request->hasFile('avatar')) {
                        if (isset($employee->avatar) && ($employee->avatar != '') && Storage::exists('public/'.$employee->avatar)) {
                            Storage::delete('public/'.$employee->avatar);
                        }
                        $avatar = $request->avatar->store('employee/'. md5($user_id).'/avatar', 'public');
                        User::where('id',$user_id)->update(['avatar' => $avatar]);
                    }
                    Session::flash('success', 'Profile updated successfully');
                    return redirect(agent_url('profile/setup'));
                } else {
                    Session::flash('error', 'something went to wrong');
                }
            } else {
                Session::flash('error', 'Please fill all required fields');
            }
            return redirect()->back();
        } else {
            Session::flash('error', 'Method not found');
            return redirect()->back();
        }
    }

    public function checkEmail(Request $request) {
        if ($request->isMethod('post')) {
            $user_id            = decreptIt($request->employee_id);
            $email              = $request->email;

            if (isset($email) && ($email != "")) {
                $result         = User::where('email', $email);
                if (isset($user_id) && $user_id > 0) {
                    $result->where('id','!=',$user_id);
                }
                $count          = $result->get()->count();
            }
            $return             = TRUE;
            if ($count > 0) {
                $return         = FALSE;
            }

        } else {
            $return['status']   = false;
            $return['message']  = 'method not found';
        }
        json_output($return);
    }

    public function update_password(Request $request) {
        if ($request->isMethod('post')) {
            $validation_array = [
                'old_password'      => 'required',
                'new_password'      => 'required',
                'confirm_password'  => 'required|same:new_password',
            ];
            $validator                      = Validator::make($request->all(), $validation_array);

            if ($validator->passes()) {
                $user_id                    = $this->login_user->id;

                $old_password               = encreptIt($request->old_password);
                $new_password               = encreptIt($request->new_password);
                $confirm_password           = encreptIt($request->confirm_password);

                if ($old_password == $this->login_user->password) {
                    if ($new_password == $confirm_password) {
                        $password_update    = User::where('id', $user_id)->update(['password' => $confirm_password]);

                        Session::flash('success', 'Password updated successfully');
                    } else {
                        Session::flash('error', 'The new password and confirm password does not match.');
                    }
                } else {
                    Session::flash('error', 'Wrong old password');
                }
            } else {
                return redirect()->back()->withErrors($validator);
            }

            return redirect()->back();
        } else {
            Session::flash('error','Method not found');
            return redirect()->back();
        }
    }

    public function remove(Request $request) {
        $return                     = array();
        $user_id                    = decreptIt($request->id);
        $name                       = $request->name;

        if ($user_id !='' && $name != '') {
            $e_filter['where']      = array('id' => $user_id);
            $e_filter['row']        = 1;
            $employee               = User::get_data($e_filter);

            if (isset($name) && $name == 'avatar') {
                if (isset($employee->avatar) && ($employee->avatar != '') && Storage::exists('public/'.$employee->avatar)) {
                    Storage::delete('public/'.$employee->avatar);
                    User::where('id', $user_id)->update(['avatar' => '']);
                }
                $return['status']   = true;
                $return['message']  = 'Agent Avatar removed successfully';
            }
            else {
                $return['status']   = true;
                $return['message']  = 'Documents not found';
            }
        } else {
            $return['status']       = false;
            $return['message']      = 'Something went wrong';
        }
        echo json_encode($return);
    }

    public function student_document(Request $request) {
        $student_id                            = decreptIt($request->id);
        if(isset($student_id) &&  $student_id != '') {
            $student_doc                           = StudentDocument::where('student_id',$student_id)->get();
            $this->data['student_doc']             = $student_doc;
            $this->data['css_files'] = array(
                'css/dropzone.min.css',
                'css/dropzone.css',
            );
    
            $this->data['js_files'] = array(
                'js/dropzone.min.js',
            );
    
            return view('front.profile.student_document', $this->data);
        } else {
            return redirect(admin_url('dashboard'));
        }
    }

}
