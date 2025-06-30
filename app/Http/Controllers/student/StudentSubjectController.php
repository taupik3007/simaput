<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TeachingAssignment;
use Illuminate\Support\Facades\Auth;


class StudentSubjectController extends Controller
{
     public function index(){
    $subject = TeachingAssignment::where('teach_class_id',Auth::user()->student->std_class_id)->get();
    // dd($subject);
      return view('student.subject.index',compact(['subject']));
    }
}
