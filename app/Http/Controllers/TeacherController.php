<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\TeachingAssignment;

use Alert;
use Illuminate\Support\Facades\Hash;


class TeacherController extends Controller
{
    public function index(){
        $teacher = User::Role('teacher')->get();
        return view('staff.teacher.index',compact(['teacher']));
    }
    public function create(){
        return view('staff.teacher.create');
    }
    public function store(request $request){
    //    dd($request);
     $request->validate([
        'name'      => 'required|string|max:255',
        'usr_nik'   => 'required|string|max:20|unique:users,usr_nik',
        'email'     => 'required|email|unique:users,email',
        'password'  => 'required|string|min:6',
    ], [
        'name.required'     => 'Nama wajib diisi.',
        'usr_nik.required'  => 'NIK wajib diisi.',
        'usr_nik.unique'    => 'NIK sudah terdaftar.',
        'email.required'    => 'Email wajib diisi.',
        'email.email'       => 'Format email tidak valid.',
        'email.unique'      => 'Email sudah terdaftar.',
        'password.required' => 'Password wajib diisi.',
        'password.min'      => 'Password minimal 6 karakter.',
    ]);

     $user = User::create([
        'name'      => $request->name,
        'usr_nik'   => $request->usr_nik,
        'email'     => $request->email,
        'password'  => Hash::make($request->password),
    ]);

    // Assign role "teacher" ke user
    $user->assignRole('teacher'); 

    Alert::success('Berhasil Menambah', 'Guru Berhasil Ditambah');
            return redirect('/staff/teacher');
    }
    public function edit($id){
        $teacher = User::findOrFail($id);

        return view('staff.teacher.edit',compact(['teacher']));
    }
    public function update(request $request,$id){
        $teacher = User::findOrFail($id);

    $request->validate([
        'name'     => 'required|string|max:255',
        'usr_nik'  => 'required|string|max:20|unique:users,usr_nik,' . $teacher->usr_id . ',usr_id',
        'email'    => 'required|email|unique:users,email,' . $teacher->usr_id . ',usr_id',
    ], [
        'name.required'     => 'Nama wajib diisi.',
        'usr_nik.required'  => 'NIK wajib diisi.',
        'usr_nik.unique'    => 'NIK sudah digunakan.',
        'email.required'    => 'Email wajib diisi.',
        'email.email'       => 'Format email tidak valid.',
        'email.unique'      => 'Email sudah digunakan.',
    ]);

    $teacher->update([
        'name'     => $request->name,
        'usr_nik'  => $request->usr_nik,
        'email'    => $request->email,
    ]);
    Alert::success('Berhasil Update', 'Guru Berhasil Diupdate');
            return redirect('/staff/teacher');
    }
    public function editPassword($id){
        // $teacher = User::findOrFail($id);

        return view('staff.teacher.edit_password');
    }
    public function updatePassword(request $request,$id){
        $request->validate([
        'password' => 'required|string|min:8|confirmed',
    ], [
        'password.required' => 'Password wajib diisi.',
        'password.min' => 'Password minimal 8 karakter.',
        'password.confirmed' => 'Konfirmasi password tidak sesuai.',
    ]);

    $teacher = User::findOrFail($id);
    $teacher->password = Hash::make($request->password);
    $teacher->save();
    Alert::success('Berhasil Update', 'Password Berhasil Diupdate');
            return redirect('/staff/teacher');

    }
    public function subject($id){
         $subject = TeachingAssignment::where('teach_teacher_id',$id)->get();
    
        return view('staff.teacher.subject',compact(['subject']));
    }
}
