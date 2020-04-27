<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ProfilesController extends Controller
{
    public function show($name)
    {
        $user = User::whereName($name)->first();
        return view('profile')->withUser($user);
    }

    public function edit($id) {
        $user = User::find($id);
        return view('profile.edit')->withUser($user);
    }

    public function update(Request $request, User $user) {
        $request->validate([
            'username'=>['required', 'string', 'max:255', 'unique:users'],
            'email'=>['required', 'string', 'email', 'max:255', 'unique:users'],
            'gender'=>['required', 'string', 'max:16'],
            'biography'=>['required', 'string', 'max:256']
        ]);

        $user->update($request);
        return redirect('profile/'.$user->username)->with('success', 'Profile Updated Successfully');
    }
}
