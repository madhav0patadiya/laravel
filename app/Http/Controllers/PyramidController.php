<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PyramidController extends Controller
{
    public function index() {
        $rows = 7;
        return view('pyramid.index', compact('rows'));
    }

    public function chart() {
        $months = ['Jan', 'Feb', 'Mar', 'Apr', 'May'];
        $sales = [12000, 9000, 10000, 14500, 13000];
        $categories = ['Electronics', 'Clothes', 'Shoes', 'Sports'];
        $revenue = [40000, 25000, 15000, 20000];

        // $sales = DB::table('sales')->pluck('amount');
        // $months = DB::table('sales')->pluck('month');

        return view('pyramid.chart', compact('months', 'sales', 'categories', 'revenue'));
    }

}
