<?php

namespace App\Http\Controllers\student;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\ProgramLevel;
use App\Models\Country;
use App\Models\Student;
use App\Models\User;
use Auth;
use Mail;
use Validator;

class AuthController extends StudentController {
    public function __construct() {
        parent::__construct();
    }

    public function index() {
        if (is_student_login()) {
            return redirect(student_url('dashboard'));
        }

        $this->data['js_files'] = array(
            'js/student/modules/auth.js',
        );
        return view('student.auth.login',$this->data);
    }

    public function login(Request $request) {
        if ($request->isMethod('post')) {
            $request->validate([
                'email' => 'required|email',
                'password' => 'required'
            ]);

            $email      = $request->email;
            $user       = Student::where('email',$email)->first();
            if (!empty($user) && isset($user->email)) {
                if ($user->password == '') {
                    Session::flash('error', 'Please activate your account');
                } else if ($user->password == encreptIt($request->password)) {
                    if ($user->allow_login == 1) {
                        set_student_session(array('id' => encreptIt($user->id)));
                        return redirect(student_url('dashboard'));
                    } else {
                        Session::flash('error', 'Your account is blocked, Contact administrator');
                    }
                } else {
                    Session::flash('error', 'Email or Password is wrong');
                }
            } else {
                Session::flash('error', 'Email or Password is wrong');
            }
        }
        return redirect(student_url());
    }

    public function register(Request $request, $agent_code = null) {
        $this->data['program_levels']   = ProgramLevel::get();
        $this->data['countries']        = Country::orderBy('name', 'asc')->get();

        if ($agent_code) {
            $agent = User::where('referral_code', $agent_code)->first();
            if ($agent) {
                $this->data['agent_code'] = $agent_code;
                $this->data['agent_name'] = $agent->fullname;
            } else {
                return redirect(student_url('register'));
            }
        }

        $this->data['js_files'] = array(
            'js/student/modules/auth.js',
        );
        return view('student.auth.register', $this->data);
    }

    public function commit_register(Request $request) {
        if ($request->isMethod('post')) {
            $request->validate([
                'firstname'         => 'required',
                'lastname'          => 'required',
                'citizenship'       => 'required',
                'address'           => 'required',
                'phone'             => 'required',
                'country_id'        => 'required',
                'course'            => 'required',
                'program_level_id'  => 'required',
                'email'             => 'required',
            ]);

            $activation_token = random_string(16);
            $student_data = array (
                'firstname'         => $request->firstname,
                'lastname'          => $request->lastname,
                'citizenship'       => $request->citizenship,
                'address'           => $request->address,
                'phone'             => $request->phone,
                'country_id'        => decreptIt($request->country_id),
                'course'            => $request->course,
                'program_level_id'  => decreptIt($request->program_level_id),
                'email'             => strtolower($request->email),
                'allow_login'       => 0,
                'remember_token'    => $activation_token,
            );
            if ($request->filled('agent_code')) {
                $agent = User::where('referral_code', $request->agent_code)->first();
                if ($agent) {
                    $student_data['agent_code'] = $agent->referral_code;
                }
            }
    
            $student    = Student::create_data($student_data);

            $link       = student_url("activate-account/{$activation_token}");
            $email_data = [
                'link' => $link,
                'name' => ucfirst($student->firstname),
            ];

            $to         = $request->email;
            $from       = env('MAIL_FROM_ADDRESS');
            $from_name  = env('MAIL_FROM_NAME');

            Mail::send('front.email_templates.account_activation', $email_data, function($message) use($to, $from, $from_name) {
                $message->to($to)->subject('Activate Your Account');
                $message->from($from, $from_name);
            });

            return redirect(student_url())->with('success', 'Registration successful! Please check your email to activate your account.');
        } else {
            return redirect(student_url())->with('error', 'Method not found');
        }
    }  

    public function forgot_setup() {
        $this->data['js_files'] = array(
            'js/student/modules/auth.js',
        );
        return view('student.auth.forgot_password',$this->data);
    }

    public function forgot_password(Request $request) {
        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), [
                'email' => 'email|required'
            ]);

            if ($validator->passes()) {
                $filter['where']        = array('email' => $request->email);
                $filter['row']          = 1;
                $user                   = Student::get_data($filter);
                $access_token           = random_string(16);
                $data['remember_token'] = $access_token;

                Student::update_data($filter, $data);
                if (!empty($user)) {

                    $link = student_url('reset-password/'.$access_token);
                    $email_data = array(
                        'link'      => $link,
                        'name'      => ucfirst($user->firstname) .' '.$user->lastname,
                    );
                    $to         = $request->email;
                    $from       = env('MAIL_FROM_ADDRESS');
                    $from_name  = env('MAIL_FROM_NAME');

                    Mail::send('front.email_templates.forget_password', $email_data, function($message) use($to,$from, $from_name) {
                        $message->to($to, '')->subject
                        ('Reset Password');
                        $message->from($from, $from_name);
                    });
                    Session::flash('success','Please check your email to reset your password');
                    return redirect(student_url());
                } else {
                    Session::flash('error','Invalid email address, Please check your email');
                    return redirect()->back();
                }
            } else {
                Session::flash('error','Please enter your email address');
                return redirect()->back();
            }
        } else {
            return redirect()->back();
        }
    }

    public function reset_password_setup(Request $request) {
        if($request->token != '') {
            $this->data['js_files'] = array(
                'js/student/modules/auth.js',
            );
            $this->data['token'] = $request->token;

            return view('student.auth.reset_password',$this->data);
        } else {
            Session::flash('error','Something went wrong');
            return redirect(student_url());
        }
    }

    public function change_password(Request $request) {
        if ($request->isMethod('post')) {
            $validation_array = [
                'new_password'          => 'required',
                'confirm_password'      => 'required|same:new_password',
            ];
            $validator = Validator::make($request->all(), $validation_array);
            if ($validator->passes()) {
                $employee   = Student::where('remember_token', $request->access_token)->first();

                if (!empty($employee)) {
                    $password_update = Student::where('remember_token', $request->access_token)->update(['password' => encreptIt($request->new_password), 'remember_token' => '']);
                    if (!empty($employee)) {
                        Session::flash('success', 'Password changed successfully');
                        return redirect(student_url());
                    } else {
                        Session::flash('error','Something went wrong');
                        return redirect()->back();
                    }
                } else {
                    Session::flash('error','Student not found');
                    return redirect()->back();
                }
            } else {
                Session::flash('error','Please enter same new password and confirm password');
                return redirect()->back();
            }
        } else {
            return redirect(student_url());
        }
    }

    public function activate_account_setup(Request $request) {
        if($request->token != '') {
            $this->data['js_files'] = array(
                'js/student/modules/auth.js',
            );
            $this->data['token'] = $request->token;

            return view('student.auth.activate_account',$this->data);
        } else {
            Session::flash('error','Something went wrong');
            return redirect(student_url());
        }
    }

    public function store_password(Request $request) {
        if ($request->isMethod('post')) {
            $validation_array = [
                'new_password'          => 'required',
                'confirm_password'      => 'required|same:new_password',
            ];
            $validator = Validator::make($request->all(), $validation_array);
            if ($validator->passes()) {
                $student   = Student::where('remember_token', $request->access_token)->first();

                if (!empty($student)) {
                    $password_update = Student::where('remember_token', $request->access_token)->update(['password' => encreptIt($request->new_password), 'allow_login' => 1, 'remember_token' => '']);
                    $user           = Student::where('email', $student->email)->first();
                    if (!empty($user)) {
                        set_student_session(array('id' => encreptIt($user->id)));
                        Session::flash('success', 'Password set successfully');
                        return redirect(student_url());
                    } else {
                        Session::flash('error','Something went wrong');
                        return redirect()->back();
                    }
                } else {
                    Session::flash('error','Student not found');
                    return redirect()->back();
                }
            } else {
                Session::flash('error','Please enter new password and confirm password must be same');
                return redirect()->back();
            }
        } else {
            return redirect(student_url());
        }
    }

    public function checkEmail(Request $request) {
        if ($request->isMethod('post')) {
            $studwnt_id         = decreptIt($request->student_id);
            $email              = $request->email;

            if (isset($email) && ($email != "")) {
                $result         = Student::where('email', $email);
                if (isset($studwnt_id) && $studwnt_id > 0) {
                    $result->where('id','!=',$studwnt_id);
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

    public function logout() {
        remove_student_session();
        return redirect(student_url());
    }

    public function login_attempt(Request $request) {
        if ($request->isMethod('post')) {
            $employee_id = get_student_user()->id;

            $employee_data  = array (
                'first_attempt'     => 1,
            );

            $filter['where'] = array('id' => $employee_id);
            Student::update_data($filter,$employee_data);
        }
    }
}
