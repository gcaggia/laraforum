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
        
        $this->validate($request, [
            'firstname' => 'required',
            'lastname'  => 'required',
            'username'  => 'required|unique:users,username,' 
                            . $user->id,
            'email'     => 'required|unique:users,email,' 
                            . $user->id,
            'country'   => 'required',
            'skills'    => 'required',
            'biography' => 'required',
        ]);

        $user->update([
            'firstname' => $request->firstname,
            'lastname'  => $request->lastname,
            'username'  => $request->username,
            'email'     => $request->email,
            'country'   => $request->country,
            'skills'    => $request->skills,
            'biography' => $request->biography,
        ]);

        return redirect('/user/' . $user->username);
    }
    
}
