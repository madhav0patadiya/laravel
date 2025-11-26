<?php

namespace App\Http\Controllers\admin;
use App\Models\UniversityLogo;
use App\Models\Scholarship;
use App\Models\Feedback;
use App\Models\User;
use App\Models\AboutUs;
use App\Models\SocailHandle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Routing\Controller as BaseController;
use Validator;

class HomePageController extends BaseController {
    public function index(Request $request) {
        $data['uni_logo']       = UniversityLogo::get();
        $data['scholarship']    = Scholarship::inRandomOrder()->limit(3)->get();
        $data['agents']         = User::inRandomOrder()->limit(4)->get();
        $data['feedback']       = Feedback::first();
        $data['setting']        = SocailHandle::first();
        
        return view('web.home.index', $data);
    }

    public function scholarship(Request $request) {
        $id                       = decreptIt($request->id);
        if ($id > 0) {
            $filter['where']      = array('id' => $id);
            $filter['row']        = 1;
            $data['scholarship']  = Scholarship::get_data($filter);
            return view('web.home.scholarship',$data);
        }
        return redirect(web_url(''));
    }

    public function all_scholarship(Request $request) {
        $data['scholarship'] = Scholarship::latest()->get();

        return view('web.home.all_scholarship', $data);
    }

    public function about_us(Request $request) {
        $data['founders'] = AboutUs::latest()->get();

        return view('web.home.about_us', $data);
    }

    public function contact_us(Request $request) {
        $data['socail'] = SocailHandle::first();

        return view('web.home.contact_us', $data);
    }
}