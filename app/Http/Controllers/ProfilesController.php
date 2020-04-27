<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\User;

class ProfilesController extends Controller
{
    public function show($username)
    {
        $user = User::where('username', $username)->first();
        return view('profile')->withUser($user);
    }

    public function edit($username) {
        $user = User::where('username', $username)->first();
        return view('profile.edit')->withUser($user);
    }

    public function update(Request $request, $username) {
        $user = User::where('username', $username)->first();

        $updated = [
            'username' => $request['username'],
            'email' => $request['email'],
            'gender' => $request['gender'],
            'biography' => $request['biography'],
        ];

        $this->validate($request, [
            'username'=>['required', 'string', 'max:255', Rule::unique('users')->ignore($user->id)],
            'email'=>['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'gender'=>['required', 'string', 'max:16'],
            'biography'=>['string', 'max:256']
        ]);

        $user->update($updated);

        return redirect('profile/'.$user->username)->with('success', 'Profile Updated Successfully');
    }
}
