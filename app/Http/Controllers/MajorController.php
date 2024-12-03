<?php

namespace App\Http\Controllers;

use App\Models\major;
use Illuminate\Http\Request;
use App\Models\Classes;
Use Alert;
use Illuminate\Support\Facades\Auth;


class MajorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $major = major::select('mjr_name','mjr_prefix','mjr_id')->get();
        $title = 'Hapus Jurusan!';
        $text = "jurusan Tidak Bisa Kembali Jika Di Hapus";
        confirmDelete($title, $text);
        
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

        // dd(Auth::user()->usr_id);
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
                'mjr_prefix'    =>  $request->mjr_prefix,
                'mjr_created_by'=> Auth::user()->usr_id
                // 'mjr_created_by'=> Auth::user()->usr_id
            ]);
            Alert::success('Berhasil Menambah Jurusan', 'Jurusan Berhasil Ditambah');
            return redirect('/staff/major');
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
    public function edit(major $major, $id)
    {
        $major = major::findOrFail($id);
        // dd($major);
        return view('staff.major.edit',compact(['major','id']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, major $major,$id)
    {
        $request->validate([
            'mjr_name' => 'required',
            'mjr_prefix'    =>  'required'
        ],[
            'required' => 'harus di isi'
        ]);

        $nameCheck = major::where('mjr_name',$request->mjr_name)->where('mjr_id','!=',$id)->first();
        $prefixCheck = major::where('mjr_prefix',$request->mjr_prefix)->where('mjr_id','!=',$id)->first();
        // dd($majorCheck);
        if($nameCheck){
            
            
            Alert::error('Gagal Mengubah', 'Jurusan  Sudah terdaftar');
                return redirect('/staff/major');
        }else if($prefixCheck){
            // dd($prefixCheck);
            Alert::error('Gagal Mengubah', 'Singkatan Sudah terdaftar');
            return redirect('/staff/major');
        }
            $majorUpdate = Major::findOrFail($id)->update([
                'mjr_name' => $request->mjr_name,
                'mjr_prefix'    =>  $request->mjr_prefix,
                'mjr_updated_by'=> Auth::user()->usr_id

                // 'mjr_updated_by'=> Auth::user()->usr_id
            ]);
            Alert::success('Berhasil Mengubah', 'Jurusan Berhasil Diubah');
            return redirect('/staff/major');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(major $major,$id)
    {
        // dd($major);
        $classCheck = Classes::where('cls_major_id',$id)->first();
        if($classCheck){
            Alert::error('Gagal Menghapus Jurusan', 'Masih Ada Kelas Yang Terkait Ke Jurusan');
            return redirect('/staff/major');
        }
        $majorUpdate = Major::findOrFail($id)->update([
           
            'mjr_deleted_by'=> Auth::user()->usr_id
        ]);
        $majorDelete= Major::findOrFail($id)->delete();
        Alert::success('Berhasil Menghapus Jurusan', 'Jurusan Berhasil Dihapus');
        return redirect('/staff/major');
    }
}
