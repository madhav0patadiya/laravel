<?php

namespace App\Http\Controllers\student;

use App\Models\Student;
use App\Models\Country;
use App\Models\Notice;
use App\Models\User;
use App\Models\ProgramLevel;
use App\Models\StudentDocument;
use App\Models\StudentPanelDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Validator;

class ProfileController extends StudentController
{
    public function __construct() {
        parent::__construct();
    }

    public function dashboard(Request $request) {
        $this->data['notice'] = Notice::get()->first();

        if(isset($this->login_user->agent_code) && $this->login_user->agent_code != '') {
            $this->data['agent'] = User::where('referral_code', $this->login_user->agent_code)->first();
        }

        $this->data['js_files'] = array(
            'js/chart.min.js',
            'js/rounded-barchart.js',
        );
        return view('student.profile.dashboard', $this->data);
    }

    public function index() {

        $this->data['css_files'] = array(
            'css/fileupload.css',
        );
        $this->data['js_files'] = array(
            'js/dropify.js',
        );

        return view('student.profile.index', $this->data);
    }

    public function setup() {
        $this->data['program_levels']   = ProgramLevel::get();
        $this->data['countries']        = Country::get();

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

        return view('student.profile.setup', $this->data);
    }

    public function update_profile(Request $request) {
        if ($request->isMethod('post')) {
            $validation_array = [
                'firstname'         => 'required',
                'lastname'          => 'required',
                'phone'             => 'required',
                'citizenship'       => 'required',
                'country_id'        => 'required',
                'program_level_id'  => 'required',
                'course'            => 'required',
                'address'           => 'required',
                'email'             => 'email|required|unique:students,email,'.$this->login_user->id,
            ];
            $validator = Validator::make($request->all(), $validation_array);
            if ($validator->passes()) {
                if ($this->login_user->id > 0) {
                    $user_id    = $this->login_user->id;
                    $student    = Student::where('id', $user_id)->first();

                    $student_data  = array (
                        'firstname'         => $request->firstname,
                        'lastname'          => $request->lastname,
                        'phone'             => $request->phone,
                        'citizenship'       => $request->citizenship,
                        'country_id'        => decreptIt($request->country_id),
                        'program_level_id'  => decreptIt($request->program_level_id),
                        'course'            => $request->course,
                        'address'           => $request->address,
                        'email'             => strtolower($request->email),
                    );

                    if($request->password == '') {
                        unset($student_data['password']);
                    }
                    Student::where('id', $user_id)->update($student_data);

                    if ($request->hasFile('avatar')) {
                        if (isset($student->avatar) && ($student->avatar != '') && Storage::exists('public/'.$student->avatar)) {
                            Storage::delete('public/'.$student->avatar);
                        }
                        $avatar = $request->avatar->store('student/'. md5($user_id).'/avatar', 'public');
                        Student::where('id',$user_id)->update(['avatar' => $avatar]);
                    }
                    Session::flash('success', 'Profile updated successfully');
                    return redirect(student_url('profile/setup'));
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
            $user_id            = decreptIt($request->student_id);
            $email              = $request->email;

            if (isset($email) && ($email != "")) {
                $result         = Student::where('email', $email);
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

    public function remove(Request $request) {
        $return                     = array();
        $user_id                    = decreptIt($request->id);
        $name                       = $request->name;

        if ($user_id !='' && $name != '') {
            $e_filter['where']      = array('id' => $user_id);
            $e_filter['row']        = 1;
            $employee               = Student::get_data($e_filter);

            if (isset($name) && $name == 'avatar') {
                if (isset($employee->avatar) && ($employee->avatar != '') && Storage::exists('public/'.$employee->avatar)) {
                    Storage::delete('public/'.$employee->avatar);
                    Student::where('id', $user_id)->update(['avatar' => '']);
                }
                $return['status']   = true;
                $return['message']  = 'Student Avatar removed successfully';
            }
            else {
                $return['status']   = true;
                $return['message']  = 'Image not found';
            }
        } else {
            $return['status']       = false;
            $return['message']      = 'Something went wrong';
        }
        echo json_encode($return);
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
                        $password_update    = Student::where('id', $user_id)->update(['password' => $confirm_password]);

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

    public function document(Request $request) {
        $student_id                            = $this->login_user->id;
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
    
            return view('student.document.document', $this->data);
        } else {
            return redirect(student_url('dashboard'));
        }
    }

    public function document_upload(Request $request) {
        $return                     = array();
        $student_id                = decreptIt($request->id);
        if ($student_id > 0) {
            if ($request->file('document_images')) {
                $document     = $request->document_images->store('student_panel_docment/'. md5($student_id), 'public');
                StudentPanelDocument::create([
                    'student_id'   => $student_id,
                    'document'     => $document,
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
            $document       = StudentPanelDocument::where('student_id', $student_id)->get();
            if (!empty($document)) {
                $data['documents']  = $document;
                $return['status']   = true;
                $return['html']     = view('student.document.document_preview', $data)->render();
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
        $student_document           = StudentPanelDocument::find($doc_id);
        if (!empty($student_document)) {
            $docPath                = $student_document->document;
            if (Storage::exists('public/' . $docPath)) {
                Storage::delete('public/' . $docPath);
            }
            $delete                 = StudentPanelDocument::where('id', $doc_id)->delete();            
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

    public function student_letter() {
        $student_id                         = $this->login_user->id;
        if(isset($student_id) &&  $student_id != '') {
            $student_letter                 = StudentDocument::where('student_id',$student_id)->get();
            $this->data['student_letter']   = $student_letter;
            $this->data['css_files'] = array(
                'css/dropzone.min.css',
                'css/dropzone.css',
            );
    
            $this->data['js_files'] = array(
                'js/dropzone.min.js',
            );
    
            return view('student.profile.student_letter', $this->data);
        } else {
            return redirect(student_url('dashboard'));
        }
    }
}