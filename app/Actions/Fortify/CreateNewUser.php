<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Models\Biodata;
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
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'bio_nik'   => ['required', 'integer', 'unique:biodatas'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ],
        [
            'email.unique'          => 'Email Sudah Terdaftar',
            'password.min'          => 'Password Minimal :min Karakter',
            'password.confirmed'    => 'Password Tidak Sama',
            'bio_nik.unique'        => 'Nik sudah Terdaftar'
        ]
        )->validate();

       $createUser =  User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);
        
        
        if($input['role'] == 1){
            $createUser->assignRole('student');
        }elseif($input['role'] == 2){
            $createUser->assignRole('teacher');
        }else{
            $createUser->assignRole('staff');
        }
        $createBio = Biodata::create([
            'bio_user_id'   => $createUser->usr_id,
            'bio_nik'       => $input['bio_nik']
        ]);
        return $createUser;
        // dd($createUser);
        
        return $createBio;


    }
}
