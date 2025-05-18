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
    public function register_staff_page()
    {
        return view('register-staff');
    }

    public function register_staff_system(Request $request)
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

        if ($request['role'] == 3) {
            $createUser->assignRole('staff');
        }

        return redirect('/dashboard');
    }
}
