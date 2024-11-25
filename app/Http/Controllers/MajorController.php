<?php

namespace App\Http\Controllers;

use App\Models\major;
use Illuminate\Http\Request;
Use Alert;


class MajorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $major = major::select('mjr_name','mjr_prefix')->get();
        // dd($major);
        return view('staff.major.index',compact(['major']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('staff.major.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'mjr_name'      =>  'required',
            'mjr_prefix'    =>  'required'
        ],[
            'required'      => 'harus di isi'
        ]);

        $majorCheck = Major::where('mjr_name',$request->mjr_name)->orWhere('mjr_prefix',$request->mjr_prefix)->first();
        // dd($majorCheck);
        if($majorCheck){
            Alert::error('Gagal Menambah Jurusan', 'Jurusan atau Singkatan Sudah Terdaftar');
            return redirect('/staff/major');
        }
            $majroCreate = Major::create([
                'mjr_name'      =>  $request->mjr_name,
                'mjr_prefix'    =>  $request->mjr_prefix
                // 'mjr_created_by'=> Auth::user()->usr_id
            ]);
            Alert::success('Berhasil Menambah Jurusan', 'Jurusan Berhasil Ditambah');
            return redirect('/major');
    }

    /**
     * Display the specified resource.
     */
    public function show(major $major)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(major $major)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, major $major)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(major $major)
    {
        //
    }
}
