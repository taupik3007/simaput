<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\major;
use App\Models\User;
use App\Models\Student;
use App\Models\ScheduleSlot;
use App\Models\Schedule;
use App\Models\Classes;


Use Alert;
use App\Models\StudentAdmissionRegistration;
use App\Models\AcademicYear;
use Illuminate\Support\Facades\Auth;
use App\Models\StudentAdmission;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class StudentScheduleController extends Controller
{
    public function index(){
       $user = auth()->user();
    $student = $user->student;
    $class = $student->classes;

    $schs = \App\Models\ScheduleSlot::with(['schedule.teachingAssignment.subject', 'schedule.teachingAssignment.teacher'])
        ->orderBy('schs_day')->orderBy('schs_order')->get();

    $days = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];

    return view('student.schedule.index', compact('class', 'schs', 'days'));
    }
}
