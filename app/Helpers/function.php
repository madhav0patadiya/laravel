<?php

use App\Models\Admin;
use App\Models\User;
use App\Models\Student;
use App\Models\SocailHandle;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Return_;
use Illuminate\Support\Str;

    function site_name() {
        return 'hrm';
    }

    function asset_url($path = ""){
        $full_path = "";

        if ($path != '') {
            $full_path = url('/public/'.$path);
        }
        return $full_path;
    }

    function storage_url($path = ""){
        $full_path = "";
        if ($path != '') {
            $full_path = url('/storage/app/public/'.$path);
        }
        return $full_path;
    }

    function p($data, $continue = false) {
        echo '<pre>'; print_r($data);
        if (!$continue) {
            die;
        }
    }

    function day_diff_leave($fromdate, $todate) {
        $d1     = new DateTime($fromdate);
        $d2     = new DateTime($todate);
        $d2->modify('+1 day');
        $diff   = $d2->diff($d1);
        return  $diff->days;
    }
    function day_diff($fromdate, $todate) {
        $d1     = new DateTime($fromdate);
        $d2     = new DateTime($todate);
        $diff   = $d2->diff($d1);
        return  $diff->days;
    }

    function random_string( $length = 8 ) {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        return substr( str_shuffle( $chars ), 0, $length );
    }

    function day_count($fromdate) {
        $now        = time(); // or your date as well
        $your_date  = strtotime($fromdate);
        $datediff   = $now - $your_date;
        return  round($datediff / (60 * 60 * 24));  // 85
    }

    function time_elapsed_string($datetime, $full = false) {
        date_default_timezone_set("Asia/Kolkata");
        $now    = new DateTime;
        $ago    = new DateTime($datetime);
        $diff   = $now->diff($ago);

        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;
        $string = array(
            'y' => 'year',
            'm' => 'month',
            'w' => 'week',
            'd' => 'day',
            'h' => 'hour',
            'i' => 'minute',
            's' => 'second',
        );
        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
            } else {
                unset($string[$k]);
            }
        }

        if (!$full) $string = array_slice($string, 0, 1);
        return $string ? implode(', ', $string) . ' ago' : 'just now';
    }

    function days_count($datetime, $full = false) {
        date_default_timezone_set("Asia/Kolkata");

        $date1  = date("Y-m-d");

        $diff = abs(strtotime($datetime) - strtotime($date1));

        $years  = floor($diff / (365*60*60*24));
        $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
        $days   = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
        $return = 0;

        if($years > 0) {
            return  $years.".".$months." Year";
        } elseif($months > 0) {
            return  $months." Months";
        } else {
            $day = ' Days';
             return $days.$day;
        }
    }

    function encreptIt($encrept_id = '') {
        $encrept_str    = '';
        if ($encrept_id != '') {
            $encrept_str = urlencode(base64_encode(site_name()).base64_encode($encrept_id));
        }
        return $encrept_str;
    }

    function decreptIt($encrept_id = '') {
        $decrept_id     = '';
        if ($encrept_id != '') {
            $temp_id        = urldecode($encrept_id);
            $encoded_site   = base64_encode(site_name());
            $temp_var       = explode($encoded_site, $temp_id);
            if (isset($temp_var[1])) {
                $decrept_id     = base64_decode($temp_var[1]);
            }
        }

        return $decrept_id;
    }

    function showDate($date = '') {
        if ($date != '') {
            return date('d M Y', strtotime($date));
        }
    }

    function showDate2($date = '') {
        if ($date != '') {
            return date('d/m/Y', strtotime($date));
        }
    }

    function storeDate($date = '') {
        if ($date != '') {
            try {
                return Carbon::createFromFormat('d/m/Y', $date)->format('Y-m-d');
            } catch (\Exception $e) {
                return null;
            }
        }
        return null;
    }

    function showTime($date = '') {
        if ($date != '') {
            return date("h:i A", strtotime($date));
        }
    }

    function showDateTime($date = '') {
        if ($date != '') {
            return date("d M Y h:i A", strtotime($date));
        }
    }

    function displayDates($date1, $date2, $format = 'Y-m-d' ) {
        $dates      = array();
        $current    = strtotime($date1);
        $date2      = strtotime($date2);
        $stepVal    = '+1 day';
        while( $current <= $date2 ) {
           $dates[] = date($format, $current);
           $current = strtotime($stepVal, $current);
        }
        return $dates;
    }

    function set_admin_cookie($data = array()) {
        $time   = time() + (10 * 365 * 24 * 60 * 60);

        return  setcookie("remember_admin",  $data['id'], $time, "");
    }

    function get_admin_cokie() {
        $return         = array();
        if(isset($_COOKIE['remember_admin'])) {
            $return   =  $_COOKIE['remember_admin'];
        }
        return $return;
    }

    function set_user_cookie($data = array()) {
        $time   = time() + (10 * 365 * 24 * 60 * 60);

        return  setcookie("remember_user", $data['id'] , $time, "");
	}

    function set_student_cookie($data = array()) {
        $time   = time() + (10 * 365 * 24 * 60 * 60);

        return  setcookie("remember_student", $data['id'] , $time, "");
	}

    function set_cookie($data = array()) {
        $time = time()+31556926;
                setcookie("email", $data['email'], $time, "");
                setcookie("password", $data['password'], $time, "");
        return  setcookie("remember_user", $data['id'], $time, "");
    }

    function get_user_cookie() {
        $return             = array();
        if(isset($_COOKIE['remember_user'])) {
            $return =$_COOKIE['remember_user'];
        }
        return $return;
    }

    function get_student_cookie() {
        $return             = array();
        if(isset($_COOKIE['remember_student'])) {
            $return =$_COOKIE['remember_student'];
        }
        return $return;
    }

    function set_session($data = array()) {
        session()->put(array(site_name() => $data));
        return  session();
    }

    function get_session() {
        return session()->get(site_name());
    }

    function set_admin_session($data = array()) {
        $current_session  = session()->get(site_name());
        $current_session['admin_session'] = $data;

        set_session($current_session);
    }

    function set_user_session($data = array()) {
        $current_session  = session()->get(site_name(),[]);
        $current_session['user_session'] = $data;
        set_session($current_session);
    }

    function set_student_session($data = array()) {
        $current_session  = session()->get(site_name(),[]);
        $current_session['student_session'] = $data;
        set_session($current_session);
    }

    function get_admin_session() {
        $return     = array();
        $session    = session()->get(site_name());

        if (isset($session['admin_session'])) {
            $return = $session['admin_session'];
        }

        return $return;
    }

    function get_user_session() {
        $return     = array();
        $session    = session()->get(site_name());

        if (isset($session['user_session'])) {
            $return = $session['user_session'];
        }

        return $return;
    }

    function get_student_session() {
        $return     = array();
        $session    = session()->get(site_name());

        if (isset($session['student_session'])) {
            $return = $session['student_session'];
        }

        return $return;
    }

    function is_admin_login() {
        return empty(get_admin_session()) ? false : true;
    }

    function is_user_login() {
        return empty(get_user_session()) ? false : true;
    }

    function is_student_login() {
        return empty(get_student_session()) ? false : true;
    }

    function get_admin_user() {
        $return = array();

        if (is_admin_login()) {
            $admin_session = get_admin_session();

            $user_id = isset($admin_session['id']) ? decreptIt($admin_session['id']) : 0;

            if ($user_id > 0) {
                $return = Admin::where('id',$user_id)->where('allow_login',1)->first();
            }

        }

        return $return;
    }

    function get_login_user() {
        $return = array();

        if (is_user_login()) {
            $user_session = get_user_session();

            $user_id = isset($user_session['id']) ? decreptIt($user_session['id']) : 0;

            if ($user_id > 0) {
                $return = User::where('id',$user_id)->where('allow_login',1)->first();
            }
        }

        return $return;
    }

    function get_student_user() {
        $return = array();

        if (is_student_login()) {
            $student_session = get_student_session();

            $student_id = isset($student_session['id']) ? decreptIt($student_session['id']) : 0;

            if ($student_id > 0) {
                $return = Student::where('id',$student_id)->where('allow_login',1)->first();
            }
        }

        return $return;
    }

    function remove_admin_session() {
        $user_data  = array();
        $admin_data = array();

        $session_data = get_session();
        unset($session_data['admin_session']);

        set_session($session_data);
    }

    function remove_user_session() {
        $user_data      = array();
        $employee_data  = array();

        $session_data = get_session();
        unset($session_data['user_session']);

        set_session($session_data);
    }

    function remove_student_session() {
        $user_data      = array();
        $student_data  = array();

        $session_data = get_session();
        unset($session_data['student_session']);

        set_session($session_data);
    }

    function current_controller() {
        $routeArray                 = app('request')->route()->getAction();
        $controllerAction           = class_basename($routeArray['controller']);
        list($controller, $action)  = explode('@', $controllerAction);

        return $controller;
    }

    function web_url($path = "") {
        $full_path = url('/');

        if ($path != '') {
            $full_path = url('/'.$path);
        }
        return $full_path;
    }


    function admin_url($path = "") {
        $full_path = url('/admin');

        if ($path != '') {
            $full_path = url('/admin/'.$path);
        }
        return $full_path;
    }

    function agent_url($path = "") {
        $full_path = url('/agent/');

        if ($path != '') {
            $full_path = url('/agent/'.$path);
        }
        return $full_path;
    }

    function student_url($path = "") {
        $full_path = url('/student/');

        if ($path != '') {
            $full_path = url('/student/'.$path);
        }
        return $full_path;
    }

    function convertToObject($array) {
        $object = new stdClass();
        foreach ($array as $key => $value) {
            if (is_array($value)) {
                $value = convertToObject($value);
            }
            $object->$key = $value;
        }
        return $object;
    }

    function is_today_update() {
        $user               = get_login_user();
        $filter['where']    = array('employee_id' =>  $user->id, 'created_date' => date('Y-m-d'), 'is_send' => 1);
        $task_exists        = Task::get_data($filter, true);
        date_default_timezone_set("Asia/Kolkata");
        $time               = date('H');
        $display_blink      = 0;

        // if (isset($user) && $user->role != 2 && $user->role != 4) {
        if (isset($user) && $user->role == 1 || $user->role == 3) {

            if ($time >= 18 && $task_exists == 0) {
                $display_blink   = 1;
            }
        }
        return $display_blink;
    }
    function json_output($data) {
        echo json_encode($data);die;
    }

    function default_img() {
        return asset_url('images/no_img_found.png');
    }

    function pdf_image() {
        return asset_url('images/pdf_icon.png');
    }

    function default_file() {
        return asset_url('images/file.png');
    }
    function favicon_logo() {
        return asset_url('images/favicon.png');
    }
    function header_logo() {
        return asset_url('images/logo/logo2.png');
    }

    if (!function_exists('generateReferralCode')) {
        function generateReferralCode() {
            do {
                $code = strtoupper(Str::random(8));
            } while (User::where('referral_code', $code)->exists());
    
            return $code;
        }
    }
    if (!function_exists('socialHandles')) {
        function socialHandles() {
            $social = SocailHandle::first();
            return $social;
        }
    }
    
?>
