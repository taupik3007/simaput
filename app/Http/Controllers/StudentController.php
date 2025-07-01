<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
Use Alert;
use Illuminate\Validation\Rule;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $student = Student::all();
        // $classes = Classes::where('cls_id',$id)->first();
        // dd($student);
        return view('staff.student.index',compact('student'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function tapCard($id)
    {
        $student = Student::where('std_id',$id)->first();
        return view('staff.student.tap_card',compact(['student']));
    }
    public function tapCardStore(request $request,$id)
    {
        // dd($request->rfid_code);
    //      $request->validate([
    //     'rfid_code' => 'required|string|max:255|unique:users,rfid_code',
    // ]);

    $student = Student::with('user')->findOrFail($id);
$request->validate([
    'rfid_code' => [
        'required',
        'string',
        'max:255',
        Rule::unique('users', 'rfid_code')->ignore($student->user->usr_id, 'usr_id')->whereNull('usr_deleted_at'),
    ],]);
    // Update user dengan RFID
    $student->user->rfid_code = $request->rfid_code;
    $student->user->save();

    Alert::success('Berhasil', 'Kartu RFID berhasil didaftarkan untuk ' . $student->user->name);
    return redirect('/staff/student');
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
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
    }
}
