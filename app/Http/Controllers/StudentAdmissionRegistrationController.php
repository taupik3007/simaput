<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\StudentAdmission;

use Illuminate\Http\Request;

class StudentAdmissionRegistrationController extends Controller
{
     public function notSubmitted()
    {
        $user = User::whereDoesntHave('student_admission_registration')->where('usr_status',0)->Role('student')->get();
        // dd($user);
        return view('staff.student_admission_registration.not_submitted',compact(['user']));
    }
    public function submission($admission_id)
    {
        if($admission_id == 0){
            $admission_id = StudentAdmission::latest()->first()->value('sta_id');
            // $admission_id = $admission->sta_id;
        }
        // dd($admission_id);
        $admission = StudentAdmission::with(['sta_year'=>function($query){
            $query->orderBy('acy_starting_year','asc');
        }])->get();
        dd($admission);
        $user = User::whereHas('student_admission_registration', function ($query)use ($admission_id) {
        $query->where('sar_status', 1)->where('sar_student_admission_id',$admission_id);})
        ->where('usr_status',0)->Role('student')->get();
        // dd($user);
        return view('staff.student_admission_registration.submitted_registration',compact(['user','admission']));
    }
    public function accepted($admission_id)
    {
        $user = User::whereHas('student_admission_registration',function ($query) {
        $query->where('sar_status', 2);})
        ->where('usr_status',1)->Role('student')->get();
        // dd($user);
        return view('staff.student_admission_registration.accepted_registration',compact(['user']));
    }
    public function rejected($admission_id)
    {
        $user = User::whereHas('student_admission_registration',function ($query) {
        $query->where('sar_status', 0);})->where('usr_status',0)->Role('student')->get();
        // dd($user);
        return view('staff.student_admission_registration.rejected_registration',compact(['user']));
    }
}
