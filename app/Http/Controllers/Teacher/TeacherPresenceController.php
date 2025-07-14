<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubjectAttendance;
use App\Models\SubjectAttendanceDetail;

use App\Models\TeachingAssignment;
use App\Models\student;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Alert;

class TeacherPresenceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $presence = SubjectAttendance::where('satd_teaching_id',$id)->get();
        return view('teacher.presence.index',compact(['presence','id']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
         $teaching = TeachingAssignment::with('class')->findOrFail($id);

    $students = Student::where('std_class_id', $teaching->teach_class_id)
                ->with('user')
                ->get();

    return view('teacher.presence.create', compact('teaching', 'students'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
     $request->validate([
        'satd_teaching_id' => 'required|exists:teaching_assignments,teach_id',
        'satd_date' => 'required|date',
        'presensi' => 'required|array',
    ]);

    DB::beginTransaction();

    try {
        // 1. Buat presensi utamanya (subject_attendances)
        $attendance = SubjectAttendance::create([
            'satd_teaching_id' => $request->satd_teaching_id,
            'satd_date' => $request->satd_date,
            'satd_topic' => $request->satd_topic,
            'satd_created_by' => auth()->user()->usr_id,
        ]);

        // 2. Loop & isi detail-nya per siswa
        foreach ($request->presensi as $student_id => $status) {
            SubjectAttendanceDetail::create([
                'sadt_attendance_id' => $attendance->satd_id,
                'sadt_student_id' => $student_id,
                'sadt_status' => $status,
                'sadt_created_by' => auth()->user()->usr_id,
            ]);
        }

        DB::commit();

        Alert::success('Berhasil menambah', 'Presensi telah ditambah');
            return redirect('/teacher/subject/'.$request->satd_teaching_id.'/presence');

    } catch (\Exception $e) {
        DB::rollback();
        return back()->with('error', 'Gagal menyimpan presensi: ' . $e->getMessage());
    }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
          $attendance = SubjectAttendance::findOrFail($id);

    // Ambil semua siswa dari kelas teaching-nya
    $teaching = TeachingAssignment::findOrFail($attendance->satd_teaching_id);

    $students = Student::where('std_class_id', $teaching->teach_class_id)
        ->with('user')
        ->get();

    // Ambil detail presensi yang sudah ada
    $existingDetails = SubjectAttendanceDetail::where('sadt_attendance_id', $attendance->satd_id)
        ->get()
        ->keyBy('sadt_student_id'); // supaya mudah dicocokkan

    return view('teacher.presence.edit', compact('attendance', 'students', 'existingDetails'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $request->validate([
        'satd_date' => 'required|date',
        'presensi' => 'required|array',
    ]);

    DB::beginTransaction();

    try {
        $attendance = SubjectAttendance::findOrFail($id);
        $attendance->update([
            'satd_date' => $request->satd_date,
            'satd_topic' => $request->satd_topic,
            'satd_updated_by' => auth()->user()->usr_id,
        ]);

        foreach ($request->presensi as $student_id => $status) {
    $detail = SubjectAttendanceDetail::where('sadt_attendance_id', $attendance->satd_id)
                ->where('sadt_student_id', $student_id)
                ->first();

    if ($detail) {
        $detail->update([
            'sadt_status' => $status,
            'sadt_updated_by' => auth()->user()->usr_id,
        ]);
    } else {
        SubjectAttendanceDetail::create([
            'sadt_attendance_id' => $attendance->satd_id,
            'sadt_student_id' => $student_id,
            'sadt_status' => $status,
            'sadt_created_by' => auth()->user()->usr_id,
        ]);
    }
}


        DB::commit();

        Alert::success('Berhasil menambah', 'Presensi telah ditambah');
            return redirect('/teacher/subject/'.$attendance->satd_teaching_id.'/presence');

    } catch (\Exception $e) {
        DB::rollBack();
        return back()->with('error', 'Gagal memperbarui presensi: ' . $e->getMessage());
    }
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
