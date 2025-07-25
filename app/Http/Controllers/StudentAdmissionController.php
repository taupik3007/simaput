<?php

namespace App\Http\Controllers;

use App\Models\StudentAdmission;
use App\Models\Academicyear;
use App\Models\User;
use App\Models\Semester;


use Illuminate\Http\Request;
use Carbon\Carbon;
Use Alert;
use Illuminate\Support\Facades\Auth;

class StudentAdmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Hapus Penyelenggaraan!';
        $text = "Penghapusan Sekaligus Dengan Tahun Akademik, Data Penyelenggaraan PPDB Tidak Bisa Kembali Jika Di Hapus";
        confirmDelete($title, $text);
        $studentAdmission = StudentAdmission::orderBy('sta_created_at','desc')->get();
        // setlocale(LC_TIME, 'id_ID');
        // Carbon::setLocale('id');
        // $today = Carbon::parse('2024-12-19 05:57:19')->isoFormat('D MMMM Y');
        // dd($today);
        return view('staff.student_admission.index',compact(['studentAdmission']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $time = Carbon::now();
        // dd($time);
        $studentAdmission = StudentAdmission::where('sta_ended', '>=', $time )->first();
        // dd($studentAdmission);
        if($studentAdmission){
            Alert::warning('Tidak Bisa Menambah Penyelenggaraan', 'Penyelenggaraan PPDB Masih Berjalan');
            return redirect('/staff/student-admission');

        }
        // dd($time)

        $year = Carbon::now()->year;
        if($time->month >=6){
            $year+=1;
        }
        $loop = $year+2;

        // dd($time->month);
        
        return view('staff.student_admission.create',compact(['year','loop']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->sta_ended);
        $request->validate([
            'acy_starting_year' => 'unique:academic_years'
        ],[
            'sta_year.unique' => 'tahun ajaran sudah terdaftar'
        ]);
        if($request->sta_start >= $request->sta_ended){
            $error = 'tanggal Penyelenggaraan Tidak Valid';
            return redirect('staff/student-admission/create')->withErrors(['error' => $error]);
        }
        $createAcademicYear     = AcademicYear::create([
            'acy_starting_year'  => $request->acy_starting_year,
            'acy_year_over'     => $request->acy_starting_year+1
        ]);
        $createStudentAdmission = StudentAdmission::create([
            'sta_academicy_id' => $createAcademicYear->acy_id,
            'sta_start' => $request->sta_start,
            'sta_ended' => $request->sta_ended,
            'sta_created_by' => Auth::user()->usr_id
        ]);
        $createSemester1 = Semester::create([
            'smt_academic_year_id' => $createAcademicYear->acy_id,
            'smt_name' => "ganjil",
        ]);
        $createSemester1 = Semester::create([
            'smt_academic_year_id' => $createAcademicYear->acy_id,
            'smt_name' => "genap",
        ]);


        Alert::success('Berhasil Menambah', 'Penyelenggaraan PPDB Berhasil Ditambah');
            return redirect('/staff/student-admission');



    }

    /**
     * Display the specified resource.
     */
    public function show(StudentAdmission $studentAdmission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $studentAdmission = StudentAdmission::findOrFail($id);
        // dd($studentAdmission);
        $year = Carbon::now()->year;
        $loop = $year+5;
        return view('staff.student_admission.edit',compact(['year','loop','studentAdmission']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StudentAdmission $studentAdmission,$id)
    {
        $time = Carbon::now();
        // dd($time);
        $studentAdmission = StudentAdmission::where('sta_ended', '>=', $time )->where('sta_id','!=', $id)->first();
        // dd($studentAdmission);
        if($studentAdmission){
            Alert::error('Tidak Bisa Mengedit Penyelenggaraan', 'Sedang Ada Penyelenggaraan PPDB yang Berjalan');
            return redirect('/staff/student-admission');

        }
        if($request->sta_start>=$request->sta_ended){
            Alert::error('Tidak Bisa Mengedit Penyelenggaraan', 'tanggal ridak valid');
            return redirect('/staff/student-admission');
        }

        $studentAdmissionUpdate = Studentadmission::findOrFail($id)->update([
           
            'sta_start'     => $request->sta_start,
            'sta_ended'     => $request->sta_ended,
            'sta_updated_by'=> Auth::user()->usr_id
        ]);

        Alert::success('Berhasil Mengedit penyelenggaraan', 'Penyelenggaraan PPDB Berhasil Diedit');
        return redirect('/staff/student-admission');

    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StudentAdmission $studentAdmission,$id)
    {
        $studentAdmissionDestroy = Studentadmission::findOrFail($id);
        $academicyearId          = $studentAdmissionDestroy->sta_academicy_id;
        // dd($academicyearId);
        $studentAdmissionDestroy->delete();
        $studentAdmissionDestroy = AcademicYear::findOrFail($academicyearId)->delete();
        Alert::success('Berhasil Menghapus penyelenggaraan', 'Penyelenggaraan PPDB Berhasil Dihapus');
        return redirect('/staff/student-admission');

    }

    
}
