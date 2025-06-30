<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Classes;

class studentClassesController extends Controller
{
    public function index(){
        // dd(Auth::user()->student->std_class_id);
        $classes = Classes::where('cls_id',Auth::user()->student->std_class_id)->first();
        // dd($classes->students);
        // dd($classes);
        return view('student.classes.index',compact(['classes']));
    }
}
