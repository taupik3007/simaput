<?php

namespace App\Http\Controllers;

use App\Models\AcademicYear;
use Illuminate\Http\Request;
use Carbon\Carbon;
Use Alert;


class AcademicYearController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $academicYear = AcademicYear::orderBy('acy_created_at','desc')->get();
        // dd($academicYear);
        return view('staff.academic_year.index',compact(['academicYear']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $acyCheck = AcademicYear::where('acy_status', 3)->orWhere('acy_status', 2)->count();
        if($acyCheck > 0){
            Alert::warning('Tidak bisa menambah ', 'Masih Ada Tahun Ajaran Belum Aktif Atau Sedang Dalam Proses Penerimaan');
            return redirect('/staff/academic-year');
        }
        // dd($acyCheck);
        $year = Carbon::now()->year;
        $year+=1;
        $loop = $year+2;
        return view('staff.academic_year.create',compact(['year','loop']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

       
        // dd($request);
        $request->validate([
            'acy_starting_year'      =>  'required|unique:academic_years',
           
        ],[
            'required'      => 'harus di isi',
            'unique'        => 'tahun ajaran sudah terdaftar'
        ]);      
        
        $acyCreate = AcademicYear::create([
            'acy_starting_year'     => $request->acy_starting_year,
            'acy_year_over'         => $request->acy_starting_year+1
        ]) ;
        Alert::success('Berhasil Menambah', 'Tahun Ajaran Berhasil Ditambah');
        return redirect('/staff/academic-year');
    }

    /**
     * Display the specified resource.
     */
    public function show(AcademicYear $academicYear)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AcademicYear $academicYear)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AcademicYear $academicYear)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AcademicYear $academicYear)
    {
        //
    }
}
