<?php

namespace App\Http\Controllers\admin;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Redirect;

class AdminController extends BaseController {
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    var $data;

    var $login_user;

    public function __construct() {

        $this->middleware(function ($request, $next) {
            $current_controller = current_controller();
            $allow_controller   = array('AuthController');

            if (!in_array($current_controller, $allow_controller)) {
                if (!is_admin_login()) {
                    return redirect(admin_url());
                } else {
                    $this->login_user           = get_admin_user();
                    $this->data['login_user']   = $this->login_user;
                }
            }
            return $next($request);
        });
    }
}
