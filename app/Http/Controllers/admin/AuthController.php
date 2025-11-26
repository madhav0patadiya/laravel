<?php

namespace App\Http\Controllers\admin;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Mail;
use Validator;

class AuthController extends AdminController {

    public function __construct() {
        parent::__construct();
    }

    public function setup() {
        if (is_admin_login()) {
            return redirect(admin_url('dashboard'));
        }

        $data['js_files'] = array(
            'js/admin/modules/auth.js',
        );
        return view('admin.auth.login',$data);
    }

    public function login(Request $request) {
        if ($request->isMethod('post')){
            $validation_array = [
                'email'     => 'required|email',
                'password'  => 'required'
            ];
            $validator      = Validator::make($request->all(), $validation_array);

            if($validator->passes()) {
                $email      = $request->email;
                $user       = Admin::where('email',$email)->where('password', encreptIt($request->password))->first();

                if (!empty($user)) {
                    if($user->allow_login == 1){
                        set_admin_session(array('id' => encreptIt($user->id)));

                        return redirect('admin/dashboard');
                    } else {
                        Session::flash('error', 'Your account is blocked, Contact administrator');
                        return redirect()->back();
                    }
                } else {
                    Session::flash('error',  'Invalid Email Or Password');
                    return redirect()->back();
                }
            } else {
                Session::flash('error',  'Invalid Email Or Password');
                return redirect()->back();
            }
        } else {
            return redirect('admin');
        }
    }

    public function switch_login(Request $request) {

        $id = $request->id;

        if ($id != '') {
            $user_id = decreptIt($id);
            if ($user_id > 0) {
                $user       = User::where('id',$user_id)->first();
                if (!empty($user)) {
                    set_user_session(array('id' => encreptIt($user->id)));

                    Session::flash('success', 'You are login as '.$user->firstname);

                    return redirect(agent_url().'/dashboard');
                } else {
                    return redirect()->back();
                }
            } else {
                return redirect()->back();
            }
        } else {
            return redirect()->back();
        }
    }

    public function forgot_setup() {
        $data['js_files'] = array(
            'js/admin/modules/auth.js',
        );
        return view('admin.auth.forgot_password',$data);
    }

    public function forgot_password(Request $request) {
        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), [
                'email' => 'email|required'
            ]);

            if ($validator->passes()) {
                $filter['where']    = array('email' => $request->email);
                $filter['row']      = 1;
                $user               = Admin::get_data($filter);
                $access_token       = random_string(16);
                $data['remember_token'] = $access_token;
                Admin::update_data($filter, $data);

                if (!empty($user)) {

                    $link = admin_url('reset-password/'.$access_token);
                    $email_data = array(
                        'link'      => $link,
                        'name'      => ucfirst($user->firstname) .' '.$user->lastname,
                    );
                    $to         = $request->email;
                    $from       = env('MAIL_FROM_ADDRESS');
                    $from_name  = env('MAIL_FROM_NAME');

                    Mail::send('admin.email_templates.forget_password', $email_data, function($message) use($to,$from, $from_name) {
                        $message->to($to, '')->subject
                        ('Reset Password');
                        $message->from($from, $from_name);
                    });
                    Session::flash('success','Please check your email to reset your password.');
                    return redirect(admin_url());
                } else {
                    Session::flash('error','Invalid Email Please check your email');
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
            $data['token'] = $request->token;
            $data['js_files'] = array(
                'js/admin/modules/auth.js',
            );
            return view('admin.auth.reset_password',$data);
        } else {
            Session::flash('error','Something went wrong');
            return redirect(admin_url());
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
                $admin   = Admin::where('remember_token', $request->access_token)->first();

                if (!empty($admin)) {
                    $password_update = Admin::where('remember_token', $request->access_token)->update(['password' => encreptIt($request->new_password), 'remember_token' => '']);
                    Session::flash('success', 'Password changed successfully');
                    return redirect(admin_url());
                } else {
                    Session::flash('error','User not found');
                    return redirect()->back();
                }
            } else {
                Session::flash('error','Please enter new password and confirm password must be same');
                return redirect()->back();
            }
        } else {
            return redirect(admin_url());
        }
    }

    public function logout() {
        remove_admin_session();
        return redirect('admin');
    }
}
