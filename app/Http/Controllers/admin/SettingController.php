<?php

namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use Validator;
use App\Models\UniversityLogo;
use App\Models\Scholarship;
use App\Models\Feedback;
use App\Models\Notice;
use App\Models\AboutUs;
use App\Models\SocailHandle;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;


class SettingController extends AdminController {

    public function __construct() {
        parent::__construct();
    }

    public function university_logo(Request $request) {
        $this->data['css_files'] = array(
            'css/dropzone.min.css',
            'css/dropzone.css',
        );

        $this->data['js_files'] = array(
            'js/dropzone.min.js',
        );

        return view('admin.setting.index',$this->data);
    }

    public function university_logo_upload(Request $request) {
        if ($request->file('university_logos')) {
            $logo     = $request->university_logos->store('university_logos', 'public');
            UniversityLogo::create([
                'logo'    => $logo,
            ]);
        }
        $return['status']   = true;
        $return['message']  = 'logo uploaded successfully';
        json_output($return);
    }

    public function university_logo_preview(Request $request) {
        $logos              = UniversityLogo::get();
        $data['logos']      = $logos;
        $return['status']   = true;
        $return['html']     = view('admin.setting.university_logo_preview', $data)->render();
        json_output($return);
    }

    public function university_logo_delete(Request $request) {
        $return                     = array();
        $logo_id                    = decreptIt($request->id);
        $university_logo            = UniversityLogo::find($logo_id);
        if (!empty($university_logo)) {
            $logoPath               = $university_logo->logo;
            if (Storage::exists('public/' . $logoPath)) {
                Storage::delete('public/' . $logoPath);
            }
            $delete                 = UniversityLogo::where('id', $logo_id)->delete();            
            if ($delete) {
                $return['status']   = true;
                $return['message']  = 'Logo deleted successfully';
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

    public function scholarship(Request $request) {
        if ($request->isMethod('post')) {
            $search         = $request->search;
            $start          = intval($request->start);
            $length         = intval($request->length);
            $order          = $request->order;
            $column_array   = array('id', 'title', 'is_visible');

            $order_field	= 'scholarships.id';
            $order_sort  	= 'DESC';

            $param['select']    = array("scholarships.*");

            if (!empty($order)) {
                if (isset($order[0]['column']) && $order[0]['column'] != '') {
                    $order_field = $column_array[$order[0]['column']];
                    $order_sort  = $order[0]['dir'];
                }
            }
            $param['orderby']   = array('field' => $order_field, 'order' => $order_sort);

            $total_rows = $filter_count = Scholarship::get_data($param, true);

            if (isset($request->search['value']) && $request->search['value'] != '') {
                $search = $request->search['value'];
                $param['or_where']  = array(
                    'scholarships.title' => $search,
                );
                $filter_count = Scholarship::get_data($param, true);
            }

            $param['limit']     = array('take' => $length, 'skip' => $start);
            $records            = Scholarship::get_data($param);

            $clients   = array();

            foreach ($records as $index => $row) {
                $visible = ($row->is_visible == 0) ? 'No' : 'Yes';

                $row_data           	    = array();
                $row_data['id']				= $index + 1;
                $row_data['title']          = $row->title;
                $row_data['is_visible'] 	= $visible;
                $row_data['action']         = "<a class='btn btn-outline-primary mr-1' href=".admin_url('setting/setup-scholarship/'.encreptIt($row->id))."><i class='feather feather-edit-2 ' data-toggle='tooltip' data-placement='top' title='Edit Scholarship'></i></a>
                                                <a class='btn btn-outline-danger scholarship-delete' data-id=".encreptIt($row->id)." href='javascript:void(0)'><i class='feather feather-trash-2' data-toggle='tooltip' data-placement='top' title='Delete Scholarship'></i></a>";
                $clients[]            	    = $row_data;
            }

            $data['recordsTotal']       = $total_rows;
            $data['recordsFiltered']    = $filter_count;
            $data['data']               = $clients;

            json_output($data);
        }
        return view('admin.setting.scholarship',$this->data);
    }

    public function setup_scholarship(Request $request) {
        $id     = decreptIt($request->id);
        if ($id > 0) {
            $filter['where']            = array('id' => $id);
            $filter['row']              = 1;
            $this->data['scholarship']  = Scholarship::get_data($filter);
        }

        $this->data['css_files'] = array(
            'css/fileupload.css',
            'css/summernote-bs4.css',
        );
        $this->data['js_files'] = array(
            'js/jquery-ui.js',
            'js/dropify.js',
            'js/summernote-bs4.js',
        );

        return view('admin.setting.setup_scholarship',$this->data);
    }

    public function commit_scholarship2(Request $request) {
        if ($request->isMethod('post')) {
            $validation_array = [
                'title'             => 'required',
                'overview'          => 'required',
                'fees'              => 'required',
                'application_open'  => 'required',
                'application_close' => 'required',
            ];

            $validator                  = Validator::make($request->all(), $validation_array);
            if ($validator->passes()) {
                $id                     = decreptIt($request->scholarship_id);
                $scholarship            = Scholarship::find($id);
                $is_visible             = 0;
                if ($request->is_visible == 'on') {
                    $is_visible         = 1;
                }
                $scholarship_data = array (
                    'title'             => $request->title,
                    'sub_title'         => $request->sub_title,
                    'video_link'        => $request->video_link,
                    'overview'          => $request->overview,
                    'des_point1'        => $request->des_point1,
                    'des_point2'        => $request->des_point2,
                    'des_point3'        => $request->des_point3,
                    'des_point4'        => $request->des_point4,
                    'des_point5'        => $request->des_point5,
                    'paragraph_1'       => $request->paragraph_1,
                    'paragraph_2'       => $request->paragraph_2,
                    'fees'              => $request->fees,
                    'certificate'       => $request->certificate,
                    'language'          => $request->language,
                    'application_open'  => $request->application_open,
                    'application_close' => $request->application_close,
                    'thumbnail'         => $request->thumbnail,
                    'apply_link'        => $request->apply_link,
                    'is_visible'        => $is_visible,
                );

                if ($id > 0) {
                    $filter['where']    = array('id' => $id);
                    Scholarship::update_data($filter, $scholarship_data);
                    Session::flash('success', 'Scholarship update successfully');
                } else {
                    $scholarship        = Scholarship::create_data($scholarship_data);
                    $id                 = $scholarship->id;
                    Session::flash('success', 'Scholarship created successfully');
                }
                if ($request->hasFile('thumbnail')) {
                    if (isset($scholarship->thumbnail) && ($scholarship->thumbnail != '') && Storage::exists('public/'.$scholarship->thumbnail)) {
                        Storage::delete('public/'.$scholarship->thumbnail);
                    }
                    $thumbnail          = $request->thumbnail->store('scholarship/'. md5($id), 'public');
                    Scholarship::where('id', $id)->update(['thumbnail' => $thumbnail]);
                }

                return redirect('admin/setting/scholarship');
            } else {
                Session::flash('error', 'Please fill required fields');
            }
            return redirect()->back();
        } else {
            Session::flash('error', 'Method not found');
            return redirect()->back();
        }
    }
    public function commit_scholarship(Request $request) {
        if ($request->isMethod('post')) {
            $validation_array = [
                'title'             => 'required',
                'overview'          => 'required',
                'fees'              => 'required',
                'application_open'  => 'required',
                'application_close' => 'required',
            ];

            $validator                  = Validator::make($request->all(), $validation_array);
            if ($validator->passes()) {
                $id                     = decreptIt($request->scholarship_id);
                $scholarship            = Scholarship::find($id);
                $is_visible             = 0;
                if ($request->is_visible == 'on') {
                    $is_visible         = 1;
                }
                $scholarship_data = array (
                    'title'             => $request->title,
                    'sub_title'         => $request->sub_title,
                    'video_link'        => $request->video_link,
                    'overview'          => $request->overview,
                    'des_point1'        => $request->des_point1,
                    'des_point2'        => $request->des_point2,
                    'des_point3'        => $request->des_point3,
                    'des_point4'        => $request->des_point4,
                    'des_point5'        => $request->des_point5,
                    'paragraph_1'       => $request->paragraph_1,
                    'paragraph_2'       => $request->paragraph_2,
                    'fees'              => $request->fees,
                    'certificate'       => $request->certificate,
                    'language'          => $request->language,
                    'application_open'  => $request->application_open,
                    'application_close' => $request->application_close,
                    'thumbnail'         => $request->thumbnail,
                    'apply_link'        => $request->apply_link,
                    'is_visible'        => $is_visible,
                );

                if ($id > 0) {
                    $filter['where']    = array('id' => $id);
                    Scholarship::update_data($filter, $scholarship_data);
                    $return['status']   = true;
                    $return['message']  = "Scholarship update successfully";
                } else {
                    $scholarship        = Scholarship::create_data($scholarship_data);
                    $id                 = $scholarship->id;
                    $return['status']   = true;
                    $return['message']  = "Scholarship created successfully";
                }
                if ($request->hasFile('thumbnail')) {
                    if (isset($scholarship->thumbnail) && ($scholarship->thumbnail != '') && Storage::exists('public/'.$scholarship->thumbnail)) {
                        Storage::delete('public/'.$scholarship->thumbnail);
                    }
                    $thumbnail          = $request->thumbnail->store('scholarship/'. md5($id), 'public');
                    Scholarship::where('id', $id)->update(['thumbnail' => $thumbnail]);
                }
            } else {
                $return['status']                           = false;
                $return['message']                          = $validator->errors()->first();
            }
        } else {
            $return['status']                               = false;
            $return['message']                              = "Method not found";
        }
        json_output($return);
    }

    public function delete_scholarship(Request $request) {
        $return                     = array();
        $scholarship_id             = decreptIt($request->id);
        if ($scholarship_id > 0) {
            $c_filter['where']      = array('id' => $scholarship_id);
            $c_filter['row']        = 1;
            $scholarship            = Scholarship::get_data($c_filter);
            if (!empty($scholarship->thumbnail)) {
                Storage::deleteDirectory('public/scholarship/'. md5($scholarship_id));
            }
            $filter['where']        = array('id' => $scholarship_id);
            $scholarship_delete     = Scholarship::delete_data($filter);
            if ($scholarship_delete) {
                $return['status']   = true;
                $return['message']  = 'Scholarship deleted successfully';
            } else {
                $return['status']   = false;
                $return['message']  = 'Something went wrong';
            }
        } else {
            $return['status']       = false;
            $return['message']      = 'Something went wrong';
        }
        echo json_encode($return);
    }

    public function feedback(Request $request) {
        $this->data['feedback']     = Feedback::first();
        

        $this->data['css_files'] = array(
            'css/fileupload.css',
        );
        $this->data['js_files'] = array(
            'js/jquery-ui.js',
            'js/dropify.js'
        );

        return view('admin.setting.feedback',$this->data);
    }

    public function commit_feedback(Request $request) {
        if ($request->isMethod('post')) {
            $validation_array = [
                'feed1_name'    => 'required',
                'feed2_name'    => 'required',
                'feed3_name'    => 'required',
                'feed4_name'    => 'required',
            ];

            $validator                  = Validator::make($request->all(), $validation_array);
            if ($validator->passes()) {
                $id                     = decreptIt($request->feedback_id);
                $feedback               = Feedback::find($id);
                $feedback_data = array (
                    'feed1_name'        => $request->feed1_name,
                    'feed1_subtitle'    => $request->feed1_subtitle,
                    'feed1_description' => $request->feed1_description,
                    'feed2_name'        => $request->feed2_name,
                    'feed2_subtitle'    => $request->feed2_subtitle,
                    'feed2_description' => $request->feed2_description,
                    'feed3_name'        => $request->feed3_name,
                    'feed3_subtitle'    => $request->feed3_subtitle,
                    'feed3_description' => $request->feed3_description,
                    'feed4_name'        => $request->feed4_name,
                    'feed4_subtitle'    => $request->feed4_subtitle,
                    'feed4_description' => $request->feed4_description,
                    'video1_link'       => $request->video1_link,
                    'video2_link'       => $request->video2_link,
                );

                if ($id > 0) {
                    $filter['where']    = array('id' => $id);
                    Feedback::update_data($filter, $feedback_data);
                    Session::flash('success', 'Feedback update successfully');
                } else {
                    $feedback           = Feedback::create_data($feedback_data);
                    $id                 = $feedback->id;
                    Session::flash('success', 'Feedback created successfully');
                }

                if ($request->hasFile('feed1_img')) {
                    if (isset($feedback->feed1_img) && ($feedback->feed1_img != '') && Storage::exists('public/'.$feedback->feed1_img)) {
                        Storage::delete('public/'.$feedback->feed1_img);
                    }
                    $feed1_img          = $request->feed1_img->store('feedback/'. md5($id), 'public');
                    Feedback::where('id', $id)->update(['feed1_img' => $feed1_img]);
                }

                if ($request->hasFile('feed2_img')) {
                    if (isset($feedback->feed2_img) && ($feedback->feed2_img != '') && Storage::exists('public/'.$feedback->feed2_img)) {
                        Storage::delete('public/'.$feedback->feed2_img);
                    }
                    $feed2_img          = $request->feed2_img->store('feedback/'. md5($id), 'public');
                    Feedback::where('id', $id)->update(['feed2_img' => $feed2_img]);
                }

                if ($request->hasFile('feed3_img')) {
                    if (isset($feedback->feed3_img) && ($feedback->feed3_img != '') && Storage::exists('public/'.$feedback->feed3_img)) {
                        Storage::delete('public/'.$feedback->feed3_img);
                    }
                    $feed3_img          = $request->feed3_img->store('feedback/'. md5($id), 'public');
                    Feedback::where('id', $id)->update(['feed3_img' => $feed3_img]);
                }

                if ($request->hasFile('feed4_img')) {
                    if (isset($feedback->feed4_img) && ($feedback->feed4_img != '') && Storage::exists('public/'.$feedback->feed4_img)) {
                        Storage::delete('public/'.$feedback->feed4_img);
                    }
                    $feed4_img          = $request->feed4_img->store('feedback/'. md5($id), 'public');
                    Feedback::where('id', $id)->update(['feed4_img' => $feed4_img]);
                }

                if ($request->hasFile('video1_img')) {
                    if (isset($feedback->video1_img) && ($feedback->video1_img != '') && Storage::exists('public/'.$feedback->video1_img)) {
                        Storage::delete('public/'.$feedback->video1_img);
                    }
                    $video1_img          = $request->video1_img->store('feedback/'. md5($id), 'public');
                    Feedback::where('id', $id)->update(['video1_img' => $video1_img]);
                }
                if ($request->hasFile('video2_img')) {
                    if (isset($feedback->video2_img) && ($feedback->video2_img != '') && Storage::exists('public/'.$feedback->video2_img)) {
                        Storage::delete('public/'.$feedback->video2_img);
                    }
                    $video2_img          = $request->video2_img->store('feedback/'. md5($id), 'public');
                    Feedback::where('id', $id)->update(['video2_img' => $video2_img]);
                }

                return redirect('admin/setting/feedback');
            } else {
                Session::flash('error', 'Please fill required fields');
            }
            return redirect()->back();
        } else {
            Session::flash('error', 'Method not found');
            return redirect()->back();
        }
    }

    public function notice(Request $request) {
        $this->data['notice']       = Notice::first();
        
        $this->data['css_files'] = array(
            'css/fileupload.css',
            'css/summernote-bs4.css',
        );
        $this->data['js_files'] = array(
            'js/jquery-ui.js',
            'js/dropify.js',
            'js/summernote-bs4.js',
        );

        return view('admin.setting.notice',$this->data);
    }

    public function commit_notice(Request $request) {
        if ($request->isMethod('post')) {
            $validation_array = [
                'description'    => 'required',
            ];

            $validator                  = Validator::make($request->all(), $validation_array);
            if ($validator->passes()) {
                $id                     = decreptIt($request->notice_id);
                $notice                 = Notice::find($id);
                $notice_data = array (
                    'description'        => $request->description,
                );

                if ($id > 0) {
                    $filter['where']    = array('id' => $id);
                    Notice::update_data($filter, $notice_data);
                    $return['status']   = true;
                    $return['message']  = "Notice update successfully";
                } else {
                    $notice             = Notice::create_data($notice_data);
                    $id                 = $notice->id;
                    $return['status']   = true;
                    $return['message']  = "Notice created successfully";
                }

                if ($request->hasFile('banner')) {
                    if (isset($notice->banner) && ($notice->banner != '') && Storage::exists('public/'.$notice->banner)) {
                        Storage::delete('public/'.$notice->banner);
                    }
                    $banner          = $request->banner->store('banner/'. md5($id), 'public');
                    Notice::where('id', $id)->update(['banner' => $banner]);
                }
            } else {
                $return['status']                           = false;
                $return['message']                          = $validator->errors()->first();
            }
        } else {
            $return['status']                               = false;
            $return['message']                              = "Method not found";
        }
        json_output($return);
    }

    public function about_us(Request $request) {
        if ($request->isMethod('post')) {
            $search         = $request->search;
            $start          = intval($request->start);
            $length         = intval($request->length);
            $order          = $request->order;
            $column_array   = array('id', 'name', 'title');

            $order_field	= 'about_us.id';
            $order_sort  	= 'DESC';

            $param['select']    = array("about_us.*");

            if (!empty($order)) {
                if (isset($order[0]['column']) && $order[0]['column'] != '') {
                    $order_field = $column_array[$order[0]['column']];
                    $order_sort  = $order[0]['dir'];
                }
            }
            $param['orderby']   = array('field' => $order_field, 'order' => $order_sort);

            $total_rows = $filter_count = AboutUs::get_data($param, true);

            if (isset($request->search['value']) && $request->search['value'] != '') {
                $search = $request->search['value'];
                $param['or_where']  = array(
                    'about_us.title' => $search,
                );
                $filter_count = AboutUs::get_data($param, true);
            }

            $param['limit']     = array('take' => $length, 'skip' => $start);
            $records            = AboutUs::get_data($param);

            $clients   = array();

            foreach ($records as $index => $row) {

                $row_data           	    = array();
                $row_data['id']				= $index + 1;
                $row_data['name']           = $row->name;
                $row_data['title']          = $row->title;
                $row_data['action']         = "<a class='btn btn-outline-primary mr-1' href=".admin_url('setting/setup-about-us/'.encreptIt($row->id))."><i class='feather feather-edit-2 ' data-toggle='tooltip' data-placement='top' title='Edit aboutus'></i></a>
                                                <a class='btn btn-outline-danger aboutus-delete' data-id=".encreptIt($row->id)." href='javascript:void(0)'><i class='feather feather-trash-2' data-toggle='tooltip' data-placement='top' title='Delete aboutus'></i></a>";
                $clients[]            	    = $row_data;
            }

            $data['recordsTotal']       = $total_rows;
            $data['recordsFiltered']    = $filter_count;
            $data['data']               = $clients;

            json_output($data);
        }
        return view('admin.setting.about_us',$this->data);
    }

    public function setup_about_us(Request $request) {
        $id     = decreptIt($request->id);
        if ($id > 0) {
            $filter['where']            = array('id' => $id);
            $filter['row']              = 1;
            $this->data['aboutus']      = AboutUs::get_data($filter);
        }

        $this->data['css_files'] = array(
            'css/fileupload.css',
        );
        $this->data['js_files'] = array(
            'js/jquery-ui.js',
            'js/dropify.js'
        );

        return view('admin.setting.setup_about_us',$this->data);
    }

    public function commit_about_us(Request $request) {
        if ($request->isMethod('post')) {
            $validation_array = [
                'name'             => 'required',
                'title'             => 'required',
            ];

            $validator                  = Validator::make($request->all(), $validation_array);
            if ($validator->passes()) {
                $id                     = decreptIt($request->aboutus_id);
                $aboutus                = AboutUs::find($id);
                $aboutus_data = array (
                    'name'  => $request->name,
                    'title' => $request->title,
                );

                if ($id > 0) {
                    $filter['where']    = array('id' => $id);
                    AboutUs::update_data($filter, $aboutus_data);
                    Session::flash('success', 'Founder update successfully');
                } else {
                    $aboutus            = AboutUs::create_data($aboutus_data);
                    $id                 = $aboutus->id;
                    Session::flash('success', 'Founder created successfully');
                }
                if ($request->hasFile('image')) {
                    if (isset($aboutus->image) && ($aboutus->image != '') && Storage::exists('public/'.$aboutus->image)) {
                        Storage::delete('public/'.$aboutus->image);
                    }
                    $image              = $request->image->store('founders/'. md5($id), 'public');
                    AboutUs::where('id', $id)->update(['image' => $image]);
                }

                return redirect('admin/setting/about-us');
            } else {
                Session::flash('error', 'Please fill required fields');
            }
            return redirect()->back();
        } else {
            Session::flash('error', 'Method not found');
            return redirect()->back();
        }
    }

    public function delete_about_us(Request $request) {
        $return                     = array();
        $aboutus_id                 = decreptIt($request->id);
        if ($aboutus_id > 0) {
            $c_filter['where']      = array('id' => $aboutus_id);
            $c_filter['row']        = 1;
            $aboutus                = AboutUs::get_data($c_filter);
            if (!empty($aboutus->image)) {
                Storage::deleteDirectory('public/founders/'. md5($aboutus_id));
            }
            $filter['where']        = array('id' => $aboutus_id);
            $aboutus_delete         = AboutUs::delete_data($filter);
            if ($aboutus_delete) {
                $return['status']   = true;
                $return['message']  = 'Founder deleted successfully';
            } else {
                $return['status']   = false;
                $return['message']  = 'Something went wrong';
            }
        } else {
            $return['status']       = false;
            $return['message']      = 'Something went wrong';
        }
        echo json_encode($return);
    }

    public function social_handles(Request $request) {
        $this->data['social']       = SocailHandle::first();

        $this->data['css_files'] = array(
            'css/fileupload.css',
        );
        $this->data['js_files'] = array(
            'js/jquery-ui.js',
            'js/dropify.js'
        );

        return view('admin.setting.social_handles',$this->data);
    }

    public function commit_social_handles(Request $request) {
        if ($request->isMethod('post')) {
            $id                    = decreptIt($request->social_id);
            $social                = SocailHandle::find($id);
            $aboutus_data = array (
                'facebook'          => $request->facebook,
                'instagram'         => $request->instagram,
                'twitter'           => $request->twitter,
                'whatsapp'          => $request->whatsapp,
                'phone'             => $request->phone,
                'address'           => $request->address,
                'email'             => $request->email,
                'map'               => $request->map,
                'student_notice'    => $request->student_notice,
                'sec1_subtitle'     => $request->sec1_subtitle,
                'sec1_heading'      => $request->sec1_heading,
                'sec1_para1'        => $request->sec1_para1,
                'sec1_para2'        => $request->sec1_para2,
                'sec2_subtitle'     => $request->sec2_subtitle,
                'sec2_heading'      => $request->sec2_heading,
                'sec2_para1'        => $request->sec2_para1,
                'sec2_para2'        => $request->sec2_para2,
            );

            if ($id > 0) {
                $filter['where']    = array('id' => $id);
                SocailHandle::update_data($filter, $aboutus_data);
                Session::flash('success', 'Settings update successfully');
            } else {
                Session::flash('error', 'Something went wrong');
                return redirect()->back();
            }
            if ($request->hasFile('sec1_img')) {
                if (isset($social->image) && ($social->sec1_img != '') && Storage::exists('public/'.$social->sec1_img)) {
                    Storage::delete('public/'.$social->sec1_img);
                }
                $sec1_img              = $request->sec1_img->store('sec1_img/'. md5($id), 'public');
                SocailHandle::where('id', $id)->update(['sec1_img' => $sec1_img]);
            }

            return redirect('admin/setting/social-handles');
        } else {
            Session::flash('error', 'Method not found');
            return redirect()->back();
        }
    }


}