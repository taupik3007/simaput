<?php

namespace App\Http\Controllers;

use App\Models\RequirementDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
Use Alert;



class RequirementDocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Hapus Kelas!';
        $text = "Kelas Tidak Bisa Kembali Jika Di Hapus";
        confirmDelete($title, $text);
        $requirementDocument = RequirementDocument::where('rqd_status',1)->get();
        // dd($requirementDocument);
        return view('staff.ppdb_requirement_document.index',compact(['requirementDocument']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('staff.ppdb_requirement_document.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $createRequirementdocument = RequirementDocument::create([
            'rqd_name'          => $request->rqd_name,
            'rqd_created_by'    => Auth::user()->usr_id,
            'rqd_status'        => 1
        ]);
        Alert::success('Berhasil Menambah Persayratan', 'Persyaratan Berhasil Ditambah');
        return redirect('/staff/ppdb-requirement-document');
    }

    /**
     * Display the specified resource.
     */
    public function show(RequirementDocument $requirementDocument)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RequirementDocument $requirementDocument,$id)
    {
        $requirementDocument= RequirementDocument::findOrFail($id);
        return view('staff.ppdb_requirement_document.edit',compact(['requirementDocument']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RequirementDocument $requirementDocument,$id)
    {
        $updateReuirementDocument = RequirementDocument::findOrFail($id)->update([
            'rqd_name'          => $request->rqd_name,
            'rqd_updated_by'    => Auth::user()->usr_id,
        ]);
        Alert::success('Berhasil Mengedit Persayratan', 'Persyaratan Berhasil Diedit');
        return redirect('/staff/ppdb-requirement-document');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RequirementDocument $requirementDocument,$id)
    {
        $updateRequirementDocument = RequirementDocument::findOrFail($id)->update([
            
            'rqd_deleted_by'    => Auth::user()->usr_id,
        ]);
        $deleteRequirementDocument= RequirementDocument::findOrFail($id)->delete();
        Alert::success('Berhasil menghapus Persayratan', 'Persyaratan Berhasil Dihapus');
        return redirect('/staff/ppdb-requirement-document');
    }
}
