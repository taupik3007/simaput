<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{


    function index()
    {
        return view('staff.dashboard.index');
    }

    public function teacher_index()
    {
        return view('teacher.dashboard.index');
    }
}
