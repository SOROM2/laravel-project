<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\User;
use App\Height;
use App\Weight;
use Auth;

class ProfilesController extends Controller
{
    public function show($username)
    {
        $user = User::where('username', $username)->first();
        $currentHeight = Height::where('user_id', $user->id)->orderBy('date', 'desc')->first();
        $currentWeight = Weight::where('user_id', $user->id)->orderBy('date', 'desc')->first();
        return view('profile')->withUser($user)
                              ->with('currentHeight', $currentHeight)
                              ->with('currentWeight', $currentWeight);
    }

    public function edit($username) {
        $user = User::where('username', $username)->first();
        return view('profile.edit')->withUser($user);
    }

    public function update(Request $request, $username) {
        $user = User::where('username', $username)->first();

        // if user tries to edit someone else's profile
        if (!isset($user) || ($user->id !== Auth::user()->id)) {
            return redirect('profile/'.Auth::user()->username);
        }

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
            'biography'=>['string', 'max:64']
        ]);

        $user->update($updated);

        return redirect('profile/'.Auth::user()->username)->with('success', 'Profile Updated Successfully');
    }

    public function updateImage(Request $request, $username) {
        $user = User::where('username', $username)->first();

        // deny unauthorized updates
        if (!isset($user) || ($user->id !== Auth::user()->id)) {
            return redirect('profile/'.Auth::user()->username);
        }

        // validate file upload request
        $this->validate($request, [
            'profile_image'=>['required', 'image', 'mimes:jpeg,jpg,png', 'min:40', 'max:2048'],
        ]);

        // put the file into the filesystem and update the profile_image field in the database with the new filename.
        if ($file = $request->file('profile_image')) {
           $destPath = '../public/images/user/';
           $profileImage = $_SERVER['REQUEST_TIME'].".".$file->getClientOriginalExtension();
           $file->move($destPath, $profileImage);
           $update = [
                'profile_image' => "$profileImage",
           ];
        } 

        $user->Update($update);

        return redirect('/profile/'.Auth::user()->username)->with('success', 'Profile Picture updated!');
    }
}
