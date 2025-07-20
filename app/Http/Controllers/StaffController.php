<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;
use App\Models\TeachingAssignment;

use Alert;
use Illuminate\Support\Facades\Hash;
class StaffController extends Controller
{
    public function index(){
       $teacher = User::Role('staff')->where('usr_id', '!=', auth()->id())->get();
        return view('staff.staff.index',compact(['teacher']));
    }
    public function create(){
        return view('staff.staff.create');
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
    $user->assignRole('staff'); 

    Alert::success('Berhasil Menambah', 'Guru Berhasil Ditambah');
            return redirect('/staff/staff');
    }
    public function edit($id){
        $teacher = User::findOrFail($id);

        return view('staff.staff.edit',compact(['teacher']));
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
    Alert::success('Berhasil Update', 'Staff Berhasil Diupdate');
            return redirect('/staff/staff');
    }
    public function editPassword($id){
        // $teacher = User::findOrFail($id);

        return view('staff.staff.edit_password');
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
            return redirect('/staff/staff');

    }

    public function activateCurriculum($id){
        $staff = User::where('usr_id',$id)->first();
        $staff->givePermissionTo('curriculum');
    Alert::success('Berhasil Update', 'staff Berhasil menjadi kurikulum');
    return redirect()->back();

    }
public function inactivateCurriculum($id){
        $staff = User::findOrFail($id); // lebih aman pakai findOrFail

    if ($staff->hasPermissionTo('curriculum')) {
        $staff->revokePermissionTo('curriculum');
        Alert::success('Berhasil Update', 'Akses kurikulum telah dihapus');
    } else {
        Alert::info('Info', 'User ini tidak memiliki akses kurikulum');
    }

    return redirect()->back();

    }

}
