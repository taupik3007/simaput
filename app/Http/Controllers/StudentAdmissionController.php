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
        $studentAdmission = StudentAdmission::all();
        setlocale(LC_TIME, 'id_ID');
        Carbon::setLocale('id');
        $today = Carbon::now()->isoFormat('D MMMM Y');
        // dd($today);
        return view('staff.student_admission.index',compact(['studentAdmission']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
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
            'sta_ended' => $request->sta_ended
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
    public function edit(StudentAdmission $studentAdmission)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StudentAdmission $studentAdmission)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StudentAdmission $studentAdmission)
    {
        //
    }
}
