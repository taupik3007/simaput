<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Biodata;
use App\Models\Employee;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function register_teacher_page()
    {
        return view('auth.register-teacher');
    }

    public function register_teacher_system(Request $request)
    {
        $validateData = $request->validate([
            "name" => "required | min:3 | max:255",
            "email" => "required | email:dns | unique:users,email",
            "password" => "required | min:5 | max:30",
            'role' => 'required',
            'bio_nik' => 'required|unique:users,usr_nik'
        ]);

        $createUser =  User::create([
            'name' => $validateData['name'],
            'email' => $validateData['email'],
            'password' => Hash::make($validateData['password']),
            'usr_nik' => $validateData['bio_nik'],
        ]);

        if ($request['role'] == 2) {
            $createUser->assignRole('teacher');
        }

        return redirect('/dashboard');
    }
}
