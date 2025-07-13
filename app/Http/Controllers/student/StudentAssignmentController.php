<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Assignment;
use App\Models\AssignmentSubmission;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Alert;
class StudentAssignmentController extends Controller
{
    public function index($id){
        $assignment = Assignment::where('asg_teaching_id',$id)->get();

        return view('student.assignment.index',compact(['assignment','id']));
    }
    public function create($id)
{
    $now = now();

    $assignment = Assignment::findOrFail($id);
    $submission = AssignmentSubmission::where('asb_student_id', auth()->id())
    ->where('asb_assignment_id', $assignment->asg_id)
    ->first();
    $isBeforeDeadline = $assignment->asg_due_date > $now;

return view('student.assignment.submit', compact('assignment', 'submission', 'isBeforeDeadline'));
}
public function store(Request $request, $assignmentId)
{
    $request->validate([
        'asb_file' => 'required|file|mimes:pdf,doc,docx,zip,rar|max:10240',
    ]);

    $studentId = auth()->id();

    $submission = AssignmentSubmission::where('asb_student_id', $studentId)
        ->where('asb_assignment_id', $assignmentId)
        ->first();

    // Simpan file baru
    $file = $request->file('asb_file');
    $filename = uniqid('jawaban_') . '.' . $file->getClientOriginalExtension();
    $path = $file->storeAs('submissions', $filename, 'public');

    // Kalau sebelumnya udah pernah submit, update file-nya
    if ($submission) {
        // Hapus file lama kalau ada
        if ($submission->asb_file && Storage::disk('public')->exists($submission->asb_file)) {
            Storage::disk('public')->delete($submission->asb_file);
        }

        $submission->update([
            'asb_file' => $path,
            'asb_submitted_at' => now(),
            'asb_updated_by' => $studentId,
        ]);
    } else {
        // Belum pernah submit → buat baru
        AssignmentSubmission::create([
            'asb_assignment_id' => $assignmentId,
            'asb_student_id' => $studentId,
            'asb_file' => $path,
            'asb_submitted_at' => now(),
            'asb_created_by' => $studentId,
        ]);
    }

    Alert::success('Berhasil Mengupload jawaban', 'Jawaban Berhasil Diupload');
        return redirect('/student/subject/'.$assignmentId."/assignment");
}
}
