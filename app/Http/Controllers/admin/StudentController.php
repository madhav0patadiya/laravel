<?php

namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use Validator;
use App\Models\User;
use App\Models\Student;
use App\Models\Country;
use App\Models\ProgramLevel;
use App\Models\StudentDocument;
use App\Models\StudentPanelDocument;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;


class StudentController extends AdminController {

    public function __construct() {
        parent::__construct();
    }

    public function index(Request $request) {
        if ($request->isMethod('post')) {
            $search         = $request->search;
            $start          = intval($request->start);
            $length         = intval($request->length);
            $order          = $request->order;
            $column_array   = array(
                                    'id',
                                    'firstname',
                                    'email',
                                    'agent_code',
                                    'allow_login'
                                    );

            $order_field	= 'students.id';
            $order_sort  	= 'DESC';

            $param['select']    = array("students.*");

            if (!empty($order)) {
                if (isset($order[0]['column']) && $order[0]['column'] != '') {
                    $order_field = $column_array[$order[0]['column']];
                    $order_sort  = $order[0]['dir'];
                }
            }
            $param['orderby']   = array('field' => $order_field, 'order' => $order_sort);

            $total_rows = $filter_count = Student::get_data($param, true);

            if (isset($request->search['value']) && $request->search['value'] != '') {
                $search = $request->search['value'];
                $param['or_where']  = array(
                    'students.firstname' => $search,
                    'students.email' => $search,
                    'students.agent_code' => $search,
                );
                $filter_count = Student::get_data($param, true);
            }

            $param['limit']     = array('take' => $length, 'skip' => $start);
            $records            = Student::get_data($param);

            $clients   = array();

            foreach ($records as $index => $row) {
                $status                     = ($row->allow_login == 0) ? 'No' : 'Yes';
                $referral                   = (!empty($row->agent_code)) ? '<div>' . $row->agent_code . ' (' . (!empty($row->agent) ? $row->agent->fullname : 'agent deleted') . ')</div>' : '-';
                $row_data           	    = array();
                $row_data['id']				= $index + 1;
                $row_data['name']           = $row->firstname . " " . $row->lastname;
                $row_data['email'] 	        = $row->email;
                $row_data['agent_code'] 	= $referral;
                $row_data['status'] 	    = $status;
                $row_data['action']         = "
                                                <a class='btn btn-outline-primary mr-1' href=" . admin_url('students/setup/'.encreptIt($row->id)) . "><i class='feather feather-edit-2' data-toggle='tooltip' data-placement='top' title='Edit Student'></i></a>
                                                <a class='btn btn-outline-danger student-delete' data-id=" . encreptIt($row->id) . " href='javascript:void(0)'><i class='feather feather-trash-2' data-toggle='tooltip' data-placement='top' title='Delete Student'></i></a>";
                $clients[]            	    = $row_data;
            }

            $data['recordsTotal']       = $total_rows;
            $data['recordsFiltered']    = $filter_count;
            $data['data']               = $clients;

            json_output($data);
        }
        return view('admin.student.index',$this->data);
    }

    public function setup(Request $request) {
        $id     = decreptIt($request->id);

        if ($id > 0) {
            $filter['where']            = array('id' => $id);
            $filter['row']              = 1;
            $this->data['student']      = Student::get_data($filter);
        }
        $this->data['countries']        = Country::get();
        $this->data['program_levels']   = ProgramLevel::get();
        $this->data['agents']           = User::get();

        $this->data['css_files'] = array(
            'css/fileupload.css',
        );
        $this->data['js_files'] = array(
            'js/jquery-ui.js',
            'js/dropify.js'
        );
        return view('admin.student.setup',$this->data);
    }

    public function commit(Request $request) {
        if ($request->isMethod('post')) {
            $validation_array = [
                'firstname'         => 'required',
                'lastname'          => 'required',
                'citizenship'       => 'required',
                'course'            => 'required',
                'course'            => 'required',
                'address'           => 'required',
                'country_id'        => 'required',
                'program_level_id'  => 'required',
                'email'             => 'email|required',
            ];

            $validator  = Validator::make($request->all(), $validation_array);
            if ($validator->passes()) {
                $id             = decreptIt($request->student_id);
                $student          = Student::find($id);
                $allow_login    = 0;
                $agent_code     = isset($request->agent_code) && $request->agent_code != '' ? decreptIt($request->agent_code) : null ;
                if ($request->allow_login == 'on') {
                    $allow_login = 1;
                }
                $student_data = array (
                    'firstname'         => $request->firstname,
                    'lastname'          => $request->lastname,
                    'email'             => strtolower($request->email),
                    'citizenship'       => $request->citizenship,
                    'course'            => $request->course,
                    'address'           => $request->address,
                    'phone'             => $request->phone,
                    'agent_code'        => $agent_code,
                    'country_id'        => decreptIt($request->country_id),
                    'program_level_id'  => decreptIt($request->program_level_id),
                    'password'          => encreptIt($request->password),
                    'allow_login'       => $allow_login,
                );

                if ($id > 0) {
                    if ($request->password == '') {
                        unset($student_data['password']);
                    }
                    $filter['where']    = array('id' => $id);
                    Student::update_data($filter, $student_data);
                    Session::flash('success', 'Student Profile update successfully');
                } else {
                    $student              = Student::create_data($student_data);
                    $id                   = $student->id;
                    Session::flash('success', 'Student Profile created successfully');
                }
                if ($request->hasFile('avatar')) {
                    if (isset($student->avatar) && ($student->avatar != '') && Storage::exists('public/'.$student->avatar)) {
                        Storage::delete('public/'.$student->avatar);
                    }
                    $avatar     = $request->avatar->store('student/'. md5($id), 'public');
                    Student::where('id', $id)->update(['avatar' => $avatar]);
                }

                return redirect('admin/students');
            } else {
                Session::flash('error', 'Please fill required fields');
            }
            return redirect()->back();
        } else {
            Session::flash('error', 'Method not found');
            return redirect()->back();
        }
    }

    public function delete(Request $request) {
        $return                     = array();
        $student_id                 = decreptIt($request->id);
        if ($student_id > 0) {
            $c_filter['where']      = array('id' => $student_id);
            $c_filter['row']        = 1;
            $user                   = Student::get_data($c_filter);

            if (!empty($user->avatar)) {
                Storage::deleteDirectory('public/student/'. md5($student_id));
            }

            if (Storage::exists('public/student_document/' . md5($student_id))) {
                Storage::deleteDirectory('public/student_document/' . md5($student_id));
            }
            StudentDocument::where('student_id', $student_id)->delete();

            if (Storage::exists('public/student_panel_document/' . md5($student_id))) {
                Storage::deleteDirectory('public/student_panel_document/' . md5($student_id));
            }
            StudentPanelDocument::where('student_id', $student_id)->delete();

            $filter['where']        = array('id' => $student_id);
            $student_delete         = Student::delete_data($filter);

            if ($student_delete) {
                $return['status']   = true;
                $return['message']  = 'Student deleted successfully';
            } else {
                $return['status']   = false;
                $return['message']  = 'Something went wrong';
            }
        } else {
            $return['status']   = false;
            $return['message']  = 'Something went wrong';
        }
        echo json_encode($return);
    }

    public function checkEmail(Request $request) {
        if ($request->isMethod('post')) {
            $student_id = decreptIt($request->student_id);
            $email      = $request->email;

            if (isset($email) && ($email != "")) {
                $result = Student::where('email', $email);
                if (isset($student_id) && $student_id > 0) {
                    $result->where('id','!=',$student_id);
                }
                $count = $result->get()->count();
            }

            $return = TRUE;

            if ($count > 0) {
                $return = FALSE;
            }
            echo json_encode($return);
        }
    }

    public function document(Request $request) {
        $student_id                            = decreptIt($request->id);
        if(isset($student_id) &&  $student_id != '') {
            $student                           = Student::find($student_id);
            $this->data['student']             = $student;
            $this->data['css_files'] = array(
                'css/dropzone.min.css',
                'css/dropzone.css',
            );
    
            $this->data['js_files'] = array(
                'js/dropzone.min.js',
            );
    
            return view('admin.student.document', $this->data);
        } else {
            return redirect(admin_url('dashboard'));
        }
    }

    public function document_upload(Request $request) {
        $return                     = array();
        $student_id                = decreptIt($request->id);
        if ($student_id > 0) {
            if ($request->file('document_images')) {
                $document     = $request->document_images->store('student_docment/'. md5($student_id), 'public');
                StudentDocument::create([
                    'student_id'   => $student_id,
                    'document'         => $document,
                ]);
            }
            $return['status']   = true;
            $return['message']  = 'Document uploaded successfully';
        } else {
            $return['status']       = false;
            $return['message']      = 'Something went wrong';
        }
        json_output($return);
    }

    public function document_preview(Request $request) {
        $student_id                = decreptIt($request->id);
        if (!empty($student_id)) {
            $document       = StudentDocument::where('student_id', $student_id)->get();
            if (!empty($document)) {
                $data['documents']  = $document;
                $return['status']   = true;
                $return['html']     = view('admin.student.document_preview', $data)->render();
            }
        } else {
            $return['status']       = false;
            $return['message']      = 'Something went wrong'; 
        }
        json_output($return);
    }

    public function document_delete(Request $request) {
        $return                     = array();
        $doc_id                     = decreptIt($request->id);
        $student_document           = StudentDocument::find($doc_id);
        if (!empty($student_document)) {
            $docPath                = $student_document->document;
            if (Storage::exists('public/' . $docPath)) {
                Storage::delete('public/' . $docPath);
            }
            $delete                 = StudentDocument::where('id', $doc_id)->delete();            
            if ($delete) {
                $return['status']   = true;
                $return['message']  = 'Document deleted successfully';
            } else {
                $return['status']   = false;
                $return['message']  = 'Something went wrong';
            }
        } else {
            $return['status']       = false;
            $return['message']      = 'Image data not found';
        }

        json_output($return);
    }

    public function student_document(Request $request) {
        $student_id                            = decreptIt($request->id);
        if(isset($student_id) &&  $student_id != '') {
            $student_doc                           = StudentPanelDocument::where('student_id',$student_id)->get();
            $this->data['student_doc']             = $student_doc;
            $this->data['css_files'] = array(
                'css/dropzone.min.css',
                'css/dropzone.css',
            );
    
            $this->data['js_files'] = array(
                'js/dropzone.min.js',
            );
    
            return view('admin.student.student_document', $this->data);
        } else {
            return redirect(admin_url('dashboard'));
        }
    }

}