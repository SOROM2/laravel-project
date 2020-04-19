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

    
}
