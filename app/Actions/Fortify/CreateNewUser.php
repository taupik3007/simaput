<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Models\Biodata;
use App\Models\Student;
use App\Models\Employee;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        // dd($input);
        Validator::make(
            $input,
            [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'usr_nik'   => ['required', 'integer', 'unique:users'],
                'password' => $this->passwordRules(),
                'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
            ],
            [
                'email.unique'          => 'Email Sudah Terdaftar',
                'password.min'          => 'Password Minimal :min Karakter',
                'password.confirmed'    => 'Password Tidak Sama',
                'usr_nik.unique'        => 'Nik sudah Terdaftar'
            ]
        )->validate();

        $createUser =  User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'usr_nik' => $input['usr_nik']
        ]);


        if ($input['role'] == 1) {
            $createUser->assignRole('student');

           
        }elseif($input['role'] == 2){
            $createUser->assignRole('teacher');
           
           
        }else{

            $createUser->assignRole('staff');
           
        }

        

        return $createUser;
        // dd($createUser);

        // return $createBio;


    }
}
