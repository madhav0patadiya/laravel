<?php

namespace App\Http\Controllers\front;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class FrontController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    var $login_user;
    var $current_project;

    var $data;
    var $update_exits;
    public function __construct() {

        $this->middleware(function ($request, $next) {

            $current_controller = current_controller();
            $allow_controller   = array('AuthController');
            if (!in_array($current_controller, $allow_controller)) {

                if (!is_user_login()) {
                    return redirect(agent_url());
                } else {
                    if (get_user_cookie()) {
                        set_user_session(array('id' => get_user_cookie()));
                    }
                    $this->login_user           = get_login_user();
                    $this->data['login_user']   = $this->login_user;
                }
            }
            return $next($request);
        });
    }
}
