<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Classes;
use App\Models\Student;
use App\Models\Semester;
use PDF;
use App\Models\ReportCard;
use App\Models\Assignment;
use App\Models\AssignmentSubmission;

use App\Models\ReportCardDetail;



class TeacherHomeroomController extends Controller
{
    public function index(){
        $classes = Classes::where('cls_homeroom_id',Auth::user()->usr_id)->first();
        // dd($classes);
        return view('teacher.homeroom.index',compact('classes'));
    }
    
public function showReportForm($student_id)
{
    $student = Student::with('user', 'class')->findOrFail($student_id);

    $semesters = ReportCard::where('rpc_student_id', $student_id)
    ->with('semesters') // pastikan ada relasi 'semester' di model ReportCard
     // ambil semester dari relasi
     // urutkan dari yang terbaru
    ->get();
    // ->unique('smt_id') // hilangkan duplikat berdasarkan ID semester
    // ->values(); // reset index biar rapi

    // dd($semesters);
    return view('teacher.report.select_semester', compact('student', 'semesters'));
}
public function downloadReport(Request $request, $student_id)
{
    $request->validate([
        'semester' => 'required|exists:semesters,smt_id',
    ]);

    $student = Student::with(['user', 'class'])->findOrFail($student_id);
    $semester = Semester::findOrFail($request->semester);
    $reportCard = ReportCard::where('rpc_student_id', $student_id)
        ->where('rpc_semester_id', $semester->smt_id)
        ->firstOrFail();

    $details = ReportCardDetail::with('teaching.subject')
        ->where('rcd_report_card_id', $reportCard->rpc_id)
        ->get();

    $pdf = PDF::loadView('teacher.report.pdf', compact('student', 'semester', 'reportCard', 'details'));
    return $pdf->download("Rapor_{$student->user->name}_{$semester->smt_name}.pdf");
}


}
