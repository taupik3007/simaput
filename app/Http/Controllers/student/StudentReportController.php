<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

use App\Models\Classes;
use App\Models\Student;
use App\Models\Semester;
use PDF;
use App\Models\ReportCard;
use App\Models\Assignment;
use App\Models\AssignmentSubmission;
use App\Models\ReportCardDetail;


class StudentReportController extends Controller
{
    public function index(){
        $student = Student::with('user', 'class')->findOrFail(Auth::user()->usr_id);

    $semesters = ReportCard::where('rpc_student_id', Auth::user()->usr_id)
    ->with('semesters') // pastikan ada relasi 'semester' di model ReportCard
     // ambil semester dari relasi
     // urutkan dari yang terbaru
    ->get();
    // ->unique('smt_id') // hilangkan duplikat berdasarkan ID semester
    // ->values(); // reset index biar rapi

    // dd($semesters);
    return view('student.report.index', compact('student', 'semesters'));
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
public function detailReport(Request $request, $student_id)
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

    return view('teacher.report.pdf', compact('student', 'semester', 'reportCard', 'details'));
    ;
}
}
