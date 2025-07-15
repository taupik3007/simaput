<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Semester;
class SemesterController extends Controller
{
    public function raporAccess()
{
    // Ambil semua semester + relasi academic year
    $semesters = Semester::with('academicYear')->orderByDesc('smt_created_at')->get();

    return view('staff.semester.rapor_access', compact('semesters'));
}
public function toggleRapor($id)
{
    $semester = Semester::findOrFail($id);

    $semester->update([
        'smt_report_status' => $semester->smt_report_status == 1 ? 0 : 1,
    ]);

    return back()->with('success', 'Status akses pengisian rapor berhasil diubah 😘');
}
}
