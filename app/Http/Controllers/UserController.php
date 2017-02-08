<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function profile(User $user)
    {
        return view('user.profile', compact('user'));
    }

    public function editProfile(User $user)
    {
        return view('user.edit', compact('user'));
    }

    public function updateProfile(Request $request, User $user)
    {
        //dd($request);
        $user->update([
            'country' => $request->country,
        ]);

        return redirect('/user/' . $user->username);
    }
}
