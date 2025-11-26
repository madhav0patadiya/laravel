<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Increment;
use App\Models\Leave;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Carbon;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Mail;
use Exception;

class CronController extends BaseController {

    public function daily() {
    }
}
