<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentDashboardController extends Controller
{
    //
    function index(){
        $status = Auth()->user()->usr_status;
        // dd($status);
        return view('student.dashboard.index');
    }
}
