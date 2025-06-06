<?php

namespace App\Http\Controllers\ProspectiveStudent;

use App\Http\Controllers\Controller;

use App\Models\RequirementDocumentCollection;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\RequirementDocument;
use Illuminate\Support\Facades\Auth;
Use Alert;


class RequirementDocumentCollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   

    /**
     * Show the form for creating a new resource.
     */
    public function requirementSubmission()
    {
        $requirementDocument = RequirementDocument::all();
        // dd($requirementDocument);
        return view('prospective_student.ppdb.requirement-document',compact('requirementDocument'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function requirementSubmissionStore(Request $request)
    {
         $user = auth()->user();
        // dd($user);
        foreach ($request->file('files') as $requirement_id => $file) {
        $path = $file->store('requirement_files');

        RequirementDocumentCollection::create([
            'rdc_user_id' => $user->usr_id,
            'rdc_rqd_id' => $requirement_id,
            'rdc_file' => $path,
        ]);
    }
     Alert::success('Berhasil Mengedit Biodata', 'Biodata Berhasil Diedit');
            return redirect('/prospective-student/requirement-document-collection');
    }

    /**
     * Display the specified resource.
     */
    public function show(RequirementDocumentCollection $requirementDocumentCollection)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RequirementDocumentCollection $requirementDocumentCollection)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RequirementDocumentCollection $requirementDocumentCollection)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RequirementDocumentCollection $requirementDocumentCollection)
    {
        //
    }
}
