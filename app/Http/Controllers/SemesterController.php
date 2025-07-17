<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Semester;
use Alert;
class SemesterController extends Controller
{
    public function raporAccess()
{
    $title = 'Delete User!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
    // Ambil semua semester + relasi academic year
    $activeSemester = Semester::where('smt_status', 1)->first();

    $semesters = Semester::with('academicYear')
    ->whereHas('academicYear', function ($query) {
        $query->where('acy_status', 1);
    })
    ->orderByDesc('smt_created_at')
    ->get();

    return view('staff.semester.rapor_access', compact('semesters','activeSemester'));
}
public function toggleRapor($id)
{
    $semester = Semester::findOrFail($id);

    $semester->update([
        'smt_report_status' => $semester->smt_report_status == 1 ? 0 : 1,
    ]);

    return back()->with('success', 'Status akses pengisian rapor berhasil diubah 😘');
}
public function activateSemester(){
    $semester = Semester::where('smt_status',1)->first();
    if($semester == null){
        return redirect()->back();
    }
 
    // dd($semester);
    $activateSemester = Semester::where('smt_academic_year_id',$semester->smt_academic_year_id)->where('smt_name',"genap")->first();
    $activateSemester->update([
        'smt_status'=> 1,
    ]);
    $semester->update([
        'smt_status'=> 0
    ]);
    // dd($activateSemester);
    Alert::success('Berhasil', 'Semester Genap Berhasil Di aktivasi');

        return redirect()->back();

}
}
