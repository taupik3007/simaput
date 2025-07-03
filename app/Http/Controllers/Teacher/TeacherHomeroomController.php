<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Classes;


class TeacherHomeroomController extends Controller
{
    public function index(){
        $classes = Classes::where('cls_homeroom_id',Auth::user()->usr_id)->first();
        // dd($classes);
        return view('teacher.homeroom.index',compact('classes'));
    }
}
