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
        } elseif ($user->hasRole('guru')) {
            $redirect = '/guru/dashboard';
        } elseif ($user->hasRole('student')) {
            $redirect = '/siswa/dashboard';
        } else {
            $redirect = '/dashboard'; // fallback
        }

        return redirect()->intended($redirect);
    }
}