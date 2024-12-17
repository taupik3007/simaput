<?php

namespace App\Http\Controllers;

use App\Models\StudentAdmission;
use Illuminate\Http\Request;

class StudentAdmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $studentAdmission = StudentAdmission::all();
        return view('staff.student_admission.index',compact(['studentAdmission']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
