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
    public function register_student_page()
    {
        return view('auth.register-student');
    }
    public function register_staff_page()
    {
        return view('auth.register-staff');
    }


}
