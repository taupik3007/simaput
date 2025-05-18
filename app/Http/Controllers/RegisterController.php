<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\User;
use App\Models\Biodata;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class RegisterController extends Controller
{
    //

    public function registerStudentView()
    {
        return view('RegisterStudent');
    }


    public function registerStudentSystem(Request $request)
    {
        $validateData = $request->validate([
            "name" => "required | min:3 | max:255",
            "email" => "required | email:dns | unique:users,email",
            "password" => "required | min:5 | max:30",
            'role' => 'required',
        ]);

        $createUser =  User::create([
            'name' => $validateData['name'],
            'email' => $validateData['email'],
            'password' => Hash::make($validateData['password']),
            'usr_nik' => $request['bio_nik'],
        ]);

        if ($request['role'] == 1) {
            $createUser->assignRole('student');
        }

        return redirect('/dashboard');
}

}