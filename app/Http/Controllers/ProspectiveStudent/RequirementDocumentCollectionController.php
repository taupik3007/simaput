<?php

namespace App\Http\Controllers\ProspectiveStudent;

use App\Http\Controllers\Controller;

use App\Models\RequirementDocument;
use App\Models\RequirementDocumentCollection;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Alert;


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
        $user = auth()->user();
        $submitted = RequirementDocumentCollection::where('rdc_user_id', $user->usr_id)
            ->get()
            ->keyBy('rdc_rqd_id');
        // dd($requirementDocument);
        return view('prospective_student.ppdb.requirement-document', compact('requirementDocument', 'submitted'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function requirementSubmissionStore(Request $request)
    {
        $user = auth()->user();

        $requirements = RequirementDocument::all();
        $rules = [];
        $submitted = RequirementDocumentCollection::where('rdc_user_id', $user->usr_id)
            ->pluck('rdc_rqd_id')
            ->toArray();
        foreach ($requirements as $requirement) {
            $key = 'files.' . $requirement->rqd_id;

            if (!in_array($requirement->rqd_id, $submitted)) {
                // BELUM PERNAH upload → wajib diisi
                $rules[$key] = 'required|file|mimes:pdf|max:1024';
            } else {
                // SUDAH PERNAH upload → boleh kosong
                $rules[$key] = 'nullable|file|mimes:pdf|max:1024';
            }
        }
        $request->validate($rules, [
            'files.*.required' => 'File ini wajib diisi,',
            'files.*.mimes' => 'File harus berupa PDF ',
            'files.*.max' => 'Ukuran file maksimal 1 MB ',
        ]);


        foreach ($request->file('files') as $requirement_id => $file) {
            $path = $file->store('requirement_files', 'public');

            RequirementDocumentCollection::updateOrCreate(
                [
                    'rdc_user_id' => $user->usr_id,
                    'rdc_rqd_id' => $requirement_id,
                ],
                [
                    'rdc_file' => $path,
                ]
            );
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
