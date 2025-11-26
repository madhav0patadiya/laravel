<?php

namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use Validator;
use App\Models\Company;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Mail;


class AgentController extends AdminController {

    public function __construct() {
        parent::__construct();
    }

    public function index(Request $request) {
        if ($request->isMethod('post')) {
            $return = array();
            $pagination = 12;

            $search = $request->input('search');
            $agent_data['agents'] = User::search($search)->paginate($pagination);

            $return['status']   = true;
            $return['html']     = view('admin.agent.cards', $agent_data)->render();

            return response()->json($return);
        } else {
            $this->data['search'] = $request->input('search');
            return view('admin.agent.index', $this->data);
        }
    }

    public function setup(Request $request) {
        $id                                 = decreptIt($request->id);

        if ($id > 0) {
            $filter['where']                = array('id' => $id);
            $filter['row']                  = 1;
            $this->data['agent']          = User::get_data($filter);
        }

        $this->data['css_files']            = array(
            'css/fileupload.css',
        );
        $this->data['js_files']             = array(
            'js/jquery-ui.js',
            'js/dropify.js'
        );

        return view('admin.agent.setup',$this->data);
    }

    public function commit(Request $request) {
        if ($request->isMethod('post')) {
            $validation_array = [
                'firstname' => 'required',
                'lastname'  => 'required',
                'phone'     => 'required',
                'email'     => 'required',
                'password'  => 'required',
            ];

            $validator                  = Validator::make($request->all(), $validation_array);
            if ($validator->passes()) {
                $id                     = decreptIt($request->agent_id);

                $allow_login            = 0;
                if (isset($request->allow_login) && ($request->allow_login == 'on')) {
                    $allow_login        = 1;
                }

                $commit_data = array (
                    'firstname'     => $request->firstname,
                    'lastname'      => $request->lastname,
                    'phone'         => $request->phone,
                    'email'         => $request->email,
                    'allow_login'   => $allow_login,
                    'password'      => encreptIt($request->password),
                );

                if ($id <= 0) {
                    $commit_data['referral_code'] = generateReferralCode();
                }

                $agent = array();
                if ($id > 0) {
                    $agent              = User::find($id);

                    $filter['where']    = array('id' => $id);
                    User::update_data($filter, $commit_data);

                    Session::flash('success', 'Agent updated successfully');
                } else {
                    $agent              = User::create_data($commit_data);
                    $id                 = $agent->id;
                    Session::flash('success', 'Agent createds successfully');
                }

                if ($request->hasFile('avatar')) {
                    if (isset($agent->avatar) && ($agent->avatar != '') && Storage::exists('public/'.$agent->avatar)) {
                        Storage::delete('public/'.$agent->avatar);
                    }
                    $avatar             = $request->avatar->store('employee/'. md5($id), 'public');

                    User::where('id', $id)->update(['avatar' => $avatar]);
                }

                return redirect(admin_url('agent'));
            } else {
                Session::flash('error', 'Please fill required fields');
            }
            return redirect()->back();
        } else {
            Session::flash('error', 'Method not found');
            return redirect()->back();
        }
    }

    public function check_email(Request $request){
        $email      =   $request->email;
        $admin_id   =   decreptIt($request->agent_id);
        if(isset($request->type)){
            $result =   User::where('email', $email);
            $count = $result->get()->count();
            $return     =   FALSE;
            if($count > 0){
                $return =    TRUE;
            }
        } else {
            if (isset($email) && ($email != "")) {
                $result =   User::where('email', $email);
                if (isset($admin_id) && ($admin_id > 0)) {
                    $result->where('id', '!=', $admin_id);
                }
                $count = $result->get()->count();
            }
    
            $return = TRUE;
    
            if ($count > 0) {
                $return = FALSE;
            }
        }
        json_output($return);
    }

    public function delete(Request $request) {
        $return                     = array();
        $agent_id                 = decreptIt($request->id);
        if ($agent_id > 0) {
            $c_filter['where']      = array('id' => $agent_id);
            $c_filter['row']        = 1;
            $user                   = User::get_data($c_filter);

            if (!empty($user->avatar)) {
                Storage::deleteDirectory('public/employee/'. md5($agent_id));
            }

            $filter['where']        = array('id' => $agent_id);
            $agent_delete         = User::delete_data($filter);

            if ($agent_delete) {
                $return['status']   = true;
                $return['message']  = 'Agent deleted successfully';
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
}
