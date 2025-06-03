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
            $admission_id = StudentAdmission::latest()->value('sta_id');
            // dd($admission_id);
        }
        // dd($admission_id);
        $admission = StudentAdmission::join('academic_years','student_admissions.sta_academicy_id','acy_id') ->orderBy('acy_starting_year', 'desc')
    ->with('sta_year') // eager load biasa tanpa orderBy karena sudah urut
    ->get();
        // dd($admission);
        $user = User::whereHas('student_admission_registration', function ($query)use ($admission_id) {
        $query->where('sar_status', 1)->where('sar_student_admission_id',$admission_id);})
        ->where('usr_status',0)->Role('student')->get();
        // dd($user);
        return view('staff.student_admission_registration.submitted_registration',compact(['user','admission']));
    }
    public function accepted($admission_id)
    {
        if($admission_id == 0){
            $admission_id = StudentAdmission::latest()->value('sta_id');
            // dd($admission_id);
        }
        // dd($admission_id);
        $admission = StudentAdmission::join('academic_years','student_admissions.sta_academicy_id','acy_id') ->orderBy('acy_starting_year', 'desc')
    ->with('sta_year') // eager load biasa tanpa orderBy karena sudah urut
    ->get();
        $user = User::whereHas('student_admission_registration',function ($query) {
        $query->where('sar_status', 2);})
        ->where('usr_status',1)->Role('student')->get();
        // dd($user);
        return view('staff.student_admission_registration.accepted_registration',compact(['user','admission']));
    }
    public function rejected($admission_id)
    {
        if($admission_id == 0){
            $admission_id = StudentAdmission::latest()->value('sta_id');
            // dd($admission_id);
        }
        // dd($admission_id);
        $admission = StudentAdmission::join('academic_years','student_admissions.sta_academicy_id','acy_id') ->orderBy('acy_starting_year', 'desc')
    ->with('sta_year') // eager load biasa tanpa orderBy karena sudah urut
    ->get();
        $user = User::whereHas('student_admission_registration',function ($query) {
        $query->where('sar_status', 0);})->where('usr_status',0)->Role('student')->get();
        // dd($user);
        return view('staff.student_admission_registration.rejected_registration',compact(['user','admission']));
    }
}
