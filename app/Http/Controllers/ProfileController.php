<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class ProfileController extends Controller
{
    //
    public function index()
    {
        return view('profile.profile-user');
    }
    public function editPhoto()
{
    return view('profile-image');
}

public function updatePhoto(Request $request)
{
    $request->validate([
        'photo' => 'required|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    $user = Auth::user();

    // Simpan foto
    if ($request->hasFile('photo')) {
        $path = $request->file('photo')->store('profile_photos', 'public');

        // Hapus foto lama jika ada
        if ($user->photo_url && Storage::disk('public')->exists($user->photo_url)) {
            Storage::disk('public')->delete($user->photo_url);
        }

        // Update foto user
        $user->profile_photo_path = $path;
        $user->save();
    }

    return redirect('/profile-image')->with('success', 'Foto profil berhasil diubah.');
}
}
