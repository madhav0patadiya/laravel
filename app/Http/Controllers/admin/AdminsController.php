<?php

namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use Validator;
use App\Models\Admin;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;


class AdminsController extends AdminController {

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
                                    'allow_login'
                                    );

            $order_field	= 'admins.id';
            $order_sort  	= 'DESC';

            $param['select']    = array("admins.*");

            if (!empty($order)) {
                if (isset($order[0]['column']) && $order[0]['column'] != '') {
                    $order_field = $column_array[$order[0]['column']];
                    $order_sort  = $order[0]['dir'];
                }
            }
            $param['orderby']   = array('field' => $order_field, 'order' => $order_sort);

            $total_rows = $filter_count = Admin::get_data($param, true);

            if (isset($request->search['value']) && $request->search['value'] != '') {
                $search = $request->search['value'];
                $param['or_where']  = array(
                    'admins.firstname' => $search,
                    'admins.email' => $search,
                );
                $filter_count = Admin::get_data($param, true);
            }

            $param['limit']     = array('take' => $length, 'skip' => $start);
            $records            = Admin::get_data($param);

            $clients   = array();

            foreach ($records as $index => $row) {
                $status = ($row->allow_login == 0) ? 'No' : 'Yes';

                $row_data           	    = array();
                $row_data['id']				= $index + 1;
                $row_data['name']           = $row->firstname." ".$row->lastname;
                $row_data['email'] 	        = $row->email;
                $row_data['status'] 	    = $status;
                $row_data['action']         = "
                                                <a class='btn btn-outline-primary mr-1' href=".admin_url('admin/setup/'.encreptIt($row->id))."><i class='feather feather-edit-2 ' data-toggle='tooltip' data-placement='top' title='Edit Admin'></i></a>
                                                <a class='btn btn-outline-danger admin-delete' data-id=".encreptIt($row->id)." href='javascript:void(0)'><i class='feather feather-trash-2' data-toggle='tooltip' data-placement='top' title='Delete Admin'></i></a>";
                $clients[]            	    = $row_data;
            }

            $data['recordsTotal']       = $total_rows;
            $data['recordsFiltered']    = $filter_count;
            $data['data']               = $clients;

            json_output($data);
        }
        return view('admin.admin.index',$this->data);
    }

    public function setup(Request $request) {
        $id     = decreptIt($request->id);

        if ($id > 0) {
            $filter['where']    = array('id' => $id);
            $filter['row']      = 1;
            $this->data['user']       = Admin::get_data($filter);
        }
        $this->data['css_files'] = array(
            'css/fileupload.css',
        );
        $this->data['js_files'] = array(
            'js/jquery-ui.js',
            'js/dropify.js'
        );
        return view('admin.admin.setup',$this->data);
    }

    public function commit(Request $request) {
        if ($request->isMethod('post')) {
            $validation_array = [
                'firstname' => 'required',
                'lastname'  => 'required',
                'email'     => 'email|required',
                'phone'     => 'required|numeric|digits:10',
                'password'  => 'required',
            ];

            $validator  = Validator::make($request->all(), $validation_array);
            if ($validator->passes()) {
                $id         = decreptIt($request->admin_id);
                $admin      = Admin::find($id);
                $allow_login   = 0;
                if ($request->allow_login == 'on') {
                    $allow_login = 1;
                }
                $user_data = array (
                    'firstname'     => $request->firstname,
                    'lastname'      => $request->lastname,
                    'email'         => strtolower($request->email),
                    'phone'         => $request->phone,
                    'password'      => encreptIt($request->password),
                    'allow_login'      => $allow_login
                );

                if ($id > 0) {
                    if ($request->password == '') {
                        unset($user_data['password']);
                    }

                    $filter['where']    = array('id' => $id);
                    Admin::update_data($filter, $user_data);

                    $return['status']   = true;
                    $return['message']  = 'Admin updated successfully';
                    Session::flash('success', 'Admin Profile update successfully');
                } else {
                    $admin              = Admin::create_data($user_data);
                    $id                 = $admin->id;
                    Session::flash('success', 'Admin Profile created successfully');
                }
                if ($request->hasFile('avatar')) {
                    if (isset($admin->avatar) && ($admin->avatar != '') && Storage::exists('public/'.$admin->avatar)) {
                        Storage::delete('public/'.$admin->avatar);
                    }
                    $avatar     = $request->avatar->store('admin_avatar/'. md5($id), 'public');
                    Admin::where('id', $id)->update(['avatar' => $avatar]);
                }

                return redirect('admin/admins');
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
        $return     = array();
        $admin_id   = decreptIt($request->id);

        if ($admin_id > 0) {
            $c_filter['where']  = array('id' => $admin_id);
            $c_filter['row']    = 1;
            $admin              = Admin::get_data($c_filter);

            if (!empty($admin->avatar)) {
                Storage::deleteDirectory('public/admin_avatar/'.$admin_id);
            }

            $filter['where']    = array('id' => $admin_id);
            $client_delete      = Admin::delete_data($filter);

            if ($client_delete) {
                $return['status']   = true;
                $return['message']  = 'Admin deleted successfully';
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
}
