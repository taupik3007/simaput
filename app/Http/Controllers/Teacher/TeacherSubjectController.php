<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TeachingAssignment;
use Illuminate\Support\Facades\Auth;
class TeacherSubjectController extends Controller
{
    public function index(){
    $subject = TeachingAssignment::where('teach_teacher_id',Auth::user()->usr_id)->get();
    // dd($subject);
    return view('teacher.subject.index',compact(['subject']));
        
    }
}
