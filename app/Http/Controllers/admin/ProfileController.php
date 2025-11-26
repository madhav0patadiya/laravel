<?php

namespace App\Http\Controllers\admin;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Validator;

class ProfileController extends AdminController
{
    public function __construct() {
        parent::__construct();
    }

    public function dashboard(Request $request) {

        // $this->data['js_files'] = array(
        //     'js/chart.min.js',
        //     'js/rounded-barchart.js',
        // );

        return view('admin.profile.dashboard', $this->data);
    }

    public function setup() {
        $this->data['css_files'] = array(
            'css/fileupload.css',
        );
        $this->data['js_files'] = array(
            'js/dropify.js',
        );

        return view('admin.profile.setup', $this->data);
    }

    public function update_profile(Request $request) {
        if ($request->isMethod('post')) {
            $this->user = get_admin_user();
            $validation_array = [
                'firstname' => 'required',
                'lastname'  => 'required',
                'email'     => 'email|required|unique:admins,email,'.$this->user->id,
                'phone'     => 'required|numeric|digits:10',
            ];

            $validator = Validator::make($request->all(), $validation_array);
            if ($validator->passes()) {
                if ($this->user->id > 0) {

                    $admin_id           = $this->user->id;
                    $admin              = Admin::where('id', $admin_id)->first();

                    $user_data = array (
                        'firstname'      => $request->firstname,
                        'lastname'       => $request->lastname,
                        'email'          => strtolower($request->email),
                        'phone'          => $request->phone,
                        'password'       => encrypt($request->password),
                        // 'avatar'         => $avatar
                    );

                    if($request->password == '') {
                        unset($user_data['password']);
                    }
                    Admin::where('id', $admin_id)->update($user_data);
                    if ($request->hasFile('avatar')) {
                        if (isset($admin->avatar) && ($admin->avatar != '') && Storage::exists('public/'.$admin->avatar)) {
                            Storage::delete('public/'.$admin->avatar);
                        }
                        $avatar = $request->avatar->store('admin_avatar/'. md5($admin_id), 'public');
                        Admin::where('id', $admin_id)->update(['avatar' => $avatar]);
                    }

                    Session::flash('success', 'Profile update successfully');
                } else {
                    Session::flash('error', 'something went to wrong');
                }
            } else {
                Session::flash('error', 'Please fill required fields');
            }
            return redirect()->back();
        } else {
            Session::flash('error', 'Method not found');
            return redirect()->back();
        }
    }

    public function checkEmail(Request $request) {
        if ($request->isMethod('post')) {
            $admin_id   = decreptIt($request->admin_id);
            $email      = $request->email;

            if (isset($email) && ($email != "")) {
                $result = Admin::where('email', $email);
                if (isset($admin_id) && $admin_id > 0) {
                    $result->where('id','!=',$admin_id);
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

    public function remove(Request $request) {
        $return             = array();
        $admin_id           = decreptIt($request->id);
        $name               = $request->name;

        if ($admin_id !='' && $name != '') {
            $e_filter['where']  = array('id' => $admin_id);
            $e_filter['row']    = 1;
            $admin              = Admin::get_data($e_filter);

            if (isset($name) && $name == 'avatar') {
                if (isset($admin->avatar) && ($admin->avatar != '') && Storage::exists('public/'.$admin->avatar)) {
                    Storage::delete('public/'.$admin->avatar);
                    Admin::where('id', $admin_id)->update(['avatar' => '']);
                }
                $return['status']   = true;
                $return['message']  = 'Admin Avatar removed successfully';
            }
            else {
                $return['status']   = true;
                $return['message']  = 'Documents not found';
            }
        } else {
            $return['status']   = false;
            $return['message']  = 'Something went wrong';
        }
        echo json_encode($return);
    }

    public function update_password(Request $request) {
        if ($request->isMethod('post')) {
            $this->user = get_admin_user();
            $validation_array = [
                'old_password'      => 'required',
                'new_password'      => 'required',
                'confirm_password'  => 'required|same:new_password',
            ];

            $validator = Validator::make($request->all(), $validation_array);

            if ($validator->passes()) {
                $admin_id   = $this->user->id;
                $old_password       = encreptIt($request->old_password);
                $new_password       = encreptIt($request->new_password);
                $confirm_password   = encreptIt($request->confirm_password);

                if ($old_password == $this->user->password) {
                    if ($new_password == $confirm_password) {
                        Admin::where('id', $admin_id)->update(['password' => $confirm_password]);

                        Session::flash('success', 'Password updated successfully');
                    } else {
                        session()->flash('error', 'The password new_password and confirm password does not match.');
                    }
                } else {
                    session()->flash('error', 'You are entering the wrong old password');
                    return redirect()->back();
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
}
