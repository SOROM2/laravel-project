@extends('layouts.app')

@section('content')

@if ($message = Session::get('success'))
    <div class="alert alert-success alert-block col-xl-6 col-md-6 col-sm-10 mx-auto">
        <button type="button" class="close" data-dismiss="alert">close</button>
        <strong>{{ $message }}</strong>
    </div>
@endif


<div class="row py-5 px-4">
    <div class="col-xl-6 col-md-6 col-sm-10 mx-auto">
    <h3 class="text-center">  {{$user->name}} </h3>
    <div class="bg-white shadow rounded overflow-hidden">
            <div class="px-4 pt-0 pb-4 bg-secondary">
                <div class="media align-items-end profile-header">
                    <div class="media-body mb-5 text-center">
                    <br>
                        <div class="col-md-12 text-center">
                            @if (isset($user->profile_image))
                                <img class="rounded-circle col-xl-6 col-md-6 col-sm-10 mx-auto" alt="User profile image" src="/images/user/{{ $user->profile_image }}">
                            @else
                                <img class="rounded-circle col-xl-6 col-md-6 col-sm-10 mx-auto" alt="Bootstrap Image Preview" src="{{ asset('images/Home.jpg') }}"/>
                            @endif
                        </div>     
                        <br>
                        <h5 class="mt-0 mb-0 text-white">Email: {{$user->email}}</h5></br>
                        <h5 class="mt-0 mb-0 text-white">Gender: {{$user->gender}}</h5></br>
                        <h5 class="mt-0 mb-0 text-white">Starting Weight: {{$user->weightStarting}} Kg</h5>
                        <h5 class="mt-0 mb-0 text-white">Current Weight: {{is_null($currentWeight) ? $user->weightStarting : $currentWeight->Kilograms }} Kg</h5></br>
                        <h5 class="mt-0 mb-0 text-white">Starting Height: {{$user->height}} Cm</h5>
                        <h5 class="mt-0 mb-0 text-white">Current Height: {{is_null($currentHeight) ? $user->height : $currentHeight->centimeters }} Cm</h5></br>
                        @if ( isset($user->biography) )
                            <h5 class="mt-0 mb-0 text-white">Bio:</h5></br>
                            <p class="text-white">{{$user->biography}}</p>
                        @endif
                        
                    </div>                  
                </div> 
            @if ($user->id === Auth::user()->id)
                <a href="/profile/{{$user->username}}/edit" class="btn btn-primary">Edit Profile</a>
            @endif
            </div>      

       </div>
       <div class="row justify-content-center">
	</div>

   

@endsection
