<?php

namespace App\Http\Controllers\student;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class StudentController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    var $login_user;
    var $data;
    public function __construct() {
        $this->middleware(function ($request, $next) {
            $current_controller = current_controller();
            $allow_controller   = array('AuthController');
            if (!in_array($current_controller, $allow_controller)) {

                if (!is_student_login()) {
                    return redirect(student_url());
                } else {
                    if (get_student_cookie()) {
                        set_student_session(array('id' => get_student_cookie()));
                    }
                    $this->login_user           = get_student_user();
                    $this->data['login_user']   = $this->login_user;
                }
            }
            return $next($request);
        });
    }
}
