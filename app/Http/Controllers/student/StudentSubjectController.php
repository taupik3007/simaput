<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TeachingAssignment;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class StudentSubjectController extends Controller
{
     public function index(){
    $subject = TeachingAssignment::where('teach_class_id',Auth::user()->student->std_class_id)->get();
    // dd($subject);
      return view('student.subject.index',compact(['subject']));
    }
    public function module($id){
    
$module = TeachingAssignment::with(['learningModules' => function ($query) {
    $query->whereDate('mod_start_date', '<=', Carbon::today());
}])
->where('teach_id', $id)
->first();

    // Cek apakah teaching ini milik guru yang sedang login
    // if ($module->teach_teacher_id != auth()->id()) {
    //     abort(403, 'Kamu tidak punya akses ke modul ini 💔');
    // }

    return view('student.subject.module', compact('module'));
    }
}
