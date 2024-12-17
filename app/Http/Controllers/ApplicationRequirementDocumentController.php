<?php

namespace App\Http\Controllers;
use App\Models\RequirementDocument;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Alert;

class ApplicationRequirementDocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Hapus Kelas!';
        $text = "Kelas Tidak Bisa Kembali Jika Di Hapus";
        confirmDelete($title, $text);
        $requirementDocument = RequirementDocument::where('rqd_status',2)->get();
        // dd($requirementDocument);
        return view('staff.application_requirement_document.index',compact(['requirementDocument']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('staff.application_requirement_document.create');
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $createRequirementdocument = RequirementDocument::create([
            'rqd_name'          => $request->rqd_name,
            'rqd_created_by'    => Auth::user()->usr_id,
            'rqd_status'        => 2
        ]);
        Alert::success('Berhasil Menambah Persayratan', 'Persyaratan Berhasil Ditambah');
        return redirect('/staff/application-requirement-document');
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
        $requirementDocument= RequirementDocument::findOrFail($id);
        return view('staff.application_requirement_document.edit',compact(['requirementDocument']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $updateReuirementDocument = RequirementDocument::findOrFail($id)->update([
            'rqd_name'          => $request->rqd_name,
            'rqd_updated_by'    => Auth::user()->usr_id,
        ]);
        Alert::success('Berhasil Mengedit Persayratan', 'Persyaratan Berhasil Diedit');
        return redirect('/staff/application-requirement-document');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $updateRequirementDocument = RequirementDocument::findOrFail($id)->update([
            
            'rqd_deleted_by'    => Auth::user()->usr_id,
        ]);
        $deleteRequirementDocument= RequirementDocument::findOrFail($id)->delete();
        Alert::success('Berhasil menghapus Persayratan', 'Persyaratan Berhasil Dihapus');
        return redirect('/staff/application-requirement-document');
    
    }
}
