<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Assignment;
use App\Models\AssignmentSubmission;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

Use Alert;

class TeacherAssignmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $assignment = Assignment::where('asg_teaching_id',$id)->get();
        return view('teacher.assignment.index',compact(['assignment','id']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        return view('teacher.assignment.create',compact(['id']));
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
          $request->validate([
        'asg_teaching_id' => 'required|exists:teaching_assignments,teach_id',
        'asg_title' => 'required|string|max:255',
        'asg_file' => 'required|file|mimes:pdf,doc,docx,zip,rar|max:10240', // max 10 MB
        'asg_due_date' => 'required|date',
        'asg_description' => 'required|string',
    ]);

    // Simpan file ke folder public/assignments
    $filePath = $request->file('asg_file')->store('assignments', 'public');

    Assignment::create([
        'asg_teaching_id' => $request->asg_teaching_id,
        'asg_title' => $request->asg_title,
        'asg_file' => $filePath,
        'asg_due_date' => $request->asg_due_date,
        'asg_description' => $request->asg_description,
        'asg_created_by' => Auth::id(),
    ]);

     Alert::success('Berhasil Menambah Tugas', 'Tugas Berhasil Ditambah');
        return redirect('/teacher/subject/'.$request->asg_teaching_id."/assignment");
    }
    

    /**
     * Display the specified resource.
     */
    public function download($filename)
    {
        
        $filePath = 'assignments/' . $filename;
        // dd($filePath);
    if (!Storage::disk('public')->exists($filePath)) {
        abort(404, 'File tidak ditemukan, Ayang 😢');
    }

    return Storage::disk('public')->download($filePath);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
         $assignment = Assignment::findOrFail($id);

    return view('teacher.assignment.edit', compact('assignment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $assignment = Assignment::findOrFail($id);

    $request->validate([
        'asg_title' => 'required|string|max:255',
        'asg_due_date' => 'required|date',
        'asg_description' => 'required|string',
        'asg_file' => 'nullable|file|mimes:pdf,doc,docx,zip,rar|max:10240',
    ]);

    // Cek apakah ada file baru
    if ($request->hasFile('asg_file')) {
        // Hapus file lama jika ada
        if ($assignment->asg_file && Storage::disk('public')->exists($assignment->asg_file)) {
            Storage::disk('public')->delete($assignment->asg_file);
        }

        // Upload file baru
        $filePath = $request->file('asg_file')->store('assignments', 'public');
        $assignment->asg_file = $filePath;
    }

    // Update data lainnya
    $assignment->asg_title = $request->asg_title;
    $assignment->asg_due_date = $request->asg_due_date;
    $assignment->asg_description = $request->asg_description;
    $assignment->asg_updated_by = Auth::id();
    $assignment->save();

     Alert::success('Berhasil Mengedit Tugas', 'Tugas Berhasil Diedit');
        return redirect('/teacher/subject/'.$request->asg_teaching_id."/assignment");
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function submission($id)
    {
        $submission = AssignmentSubmission::where('asb_assignment_id',$id)->get();
        // dd($sumbission);
        return view('teacher.assignment.submission',compact(['submission']));
    }
    public function submissionCorrection($id)
    {
        $submission = AssignmentSubmission::where('asb_id',$id)->first();
        // dd($sumbission);
        return view('teacher.assignment.correction',compact(['submission']));
    }
    public function grading($id, request $request)
    {
         $submission = AssignmentSubmission::findOrFail($id);

    $request->validate([
        'asb_score' => 'nullable|integer|min:0|max:100',
        'asb_feedback' => 'nullable|string|max:1000',
    ]);

    $submission->update([
        'asb_score' => $request->asb_score,
        'asb_feedback' => $request->asb_feedback,
        'asb_updated_by' => auth()->id(),
    ]);
    Alert::success('Berhasil Melakukan koreksi', 'Tugas Berhasil Dikoreksi');
        return redirect('/teacher/subject/'.$request->asg_teaching_id."/assignment");
    }
}
