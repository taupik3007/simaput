<?php

namespace App\Http\Controllers;

use App\Models\StudentAdmission;
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
        $text = "Penyelenggaraan PPDB Tidak Bisa Kembali Jika Di Hapus";
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

        $year = Carbon::now()->year;
        $loop = $year+5;

        // dd($year);
        return view('staff.student_admission.create',compact(['year','loop']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->sta_ended);
        $request->validate([
            'sta_year' => 'unique:student_admissions'
        ],[
            'sta_year.unique' => 'tahun ajaran sudah terdaftar'
        ]);
        if($request->sta_start >= $request->sta_ended){
            $error = 'tanggal Penyelenggaraan Tidak Valid';
            return redirect('staff/student-admission/create')->withErrors(['error' => $error]);
        }
        $createStudentAdmission = StudentAdmission::create([
            'sta_year'  => $request->sta_year,
            'sta_start' => $request->sta_start,
            'sta_ended' => $request->sta_ended,
            'sta_created_by' => Auth::user()->usr_id
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

        $studentAdmissionUpdate = Studentadmission::findOrFail($id)->update([
            'sta_year'      => $request->sta_year,
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
        $studentAdmissionDestroy = Studentadmission::findOrFail($id)->delete();
        Alert::success('Berhasil Menghapus penyelenggaraan', 'Penyelenggaraan PPDB Berhasil Dihapus');
        return redirect('/staff/student-admission');

    }
}
