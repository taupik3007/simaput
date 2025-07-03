<?php

namespace App\Http\Controllers\Teacher;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Schedule;
class TeacherScheduleController extends Controller
{
    public function index(){
         $user = auth()->user();
    // $student = $user->student;
    // $class = $student->classes;

    $schs = Schedule::with([
        'teachingAssignment.subject',
        'teachingAssignment.teacher',
        'slot' // jika kamu ingin juga ambil data slot-nya (jam/hari)
    ])
    ->whereHas('teachingAssignment', function ($query) {
        $query->where('teach_teacher_id', Auth::id());
    })
    ->orderBy('sch_slot_id')
    ->get();
    // dd($schs);

    $days = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];

    return view('teacher.schedule.index', compact( 'schs', 'days'));
    }
}
