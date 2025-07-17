<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TeachingAssignment;
use App\Models\Semester;
use App\Models\ReportCard;
use App\Models\Assignment;
use App\Models\AssignmentSubmission;

use App\Models\ReportCardDetail;
use Alert;






class TeacherReportController extends Controller
{
   public function inputForm($teaching_id)
{
    $teaching = TeachingAssignment::with(['class.students.user', 'subject'])->findOrFail($teaching_id);
    $semester = Semester::where('smt_status', 1)->firstOrFail();

    $assignments = Assignment::where('asg_teaching_id', $teaching_id)->get();
    $assignmentCount = $assignments->count();

    foreach ($teaching->class->students as $student) {
        // Ambil semua submission milik siswa ini
        $totalScore = 0;

        foreach ($assignments as $assignment) {
            $submission = AssignmentSubmission::where('asb_assignment_id', $assignment->asg_id)
                ->where('asb_student_id', $student->std_id)
                ->first();

            $totalScore += $submission ? ($submission->asb_score ?? 0) : 0;
        }

        $averageScore = $assignmentCount > 0 ? $totalScore / $assignmentCount : 0;

        // Simpan atau update ke ReportCard & Detail
        $reportCard = ReportCard::firstOrCreate([
            'rpc_student_id' => $student->std_id,
            'rpc_semester_id' => $semester->smt_id,
        ], [
            'rpc_level' => $student->class->cls_level ,
            'rpc_created_by' => auth()->id(),
            'rpc_created_at' => now(),
            'rpc_updated_at' => now(),
        ]);

        $detail = ReportCardDetail::firstOrNew([
    'rcd_report_card_id' => $reportCard->rpc_id,
    'rcd_teaching_id' => $teaching->teach_id,
]);

// Isi nilai hanya kalau belum ada
if (is_null($detail->rcd_score)) {
    $detail->rcd_score = $averageScore;
}

$detail->save();

    }

    $details = ReportCardDetail::where('rcd_teaching_id', $teaching_id)
        ->whereHas('reportCard', function ($q) use ($semester) {
            $q->where('rpc_semester_id', $semester->smt_id);
        })
        ->with(['reportCard.student.user'])
        ->get();

    return view('teacher.report.input', compact('teaching', 'semester', 'details'));
}
public function store(Request $request, $teaching_id)
{
    $semester = Semester::where('smt_status', 1)->firstOrFail();

    $request->validate([
        'scores' => 'required|array',
    ]);

    foreach ($request->scores as $rcd_id => $score) {
        ReportCardDetail::where('rcd_id', $rcd_id)
            ->whereHas('reportCard', function ($query) use ($semester) {
                $query->where('rpc_semester_id', $semester->smt_id);
            })
            ->update([
                'rcd_score' => $score,
                'rcd_updated_by' => auth()->id(),
                'rcd_updated_at' => now(),
            ]);
    }

    Alert::success('Berhasil', 'Nilai berhasil disimpan');
    return redirect()->back();
}



}
