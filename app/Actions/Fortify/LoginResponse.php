<?php

namespace App\Actions\Fortify;

use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class LoginResponse implements LoginResponseContract
{
    public function toResponse($request)
    {
        $user = auth()->user();
        // $redirect = '/staff/dashboard';
       
        if ($user->hasRole('staff')) {
            $redirect = '/staff/dashboard';
        } elseif ($user->hasRole('teacher')) {
            $redirect = '/teacher/dashboard';
        } elseif ($user->hasRole('student') && $user->usr_status == 0) {
            $redirect = '/prospective-student/home';
        }elseif ($user->hasRole('student')) {
            $redirect = '/student/dashboard';
        } else {
            $redirect = '/dashboard'; // fallback
        }

        return redirect()->intended($redirect);
    }
}