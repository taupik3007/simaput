<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Attendance;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class StudentDashboardController extends Controller
{
    //
    function index(){
        $status = Auth()->user()->usr_status;
        // dd($status);
        $presence = Attendance::where('att_user_id', Auth::user()->usr_id)
    ->whereDate('att_date', Carbon::today())
    ->first();
    // dd($presence);
        return view('student.dashboard.index',compact('presence'));
    }
}
