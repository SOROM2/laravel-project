@extends('layouts.app')

@section('content')
<div class="row py-5 px-4">
    <div class="col-xl-6 col-md-6 col-sm-10 mx-auto">

    <div class="bg-white shadow rounded overflow-hidden">
            <div class="px-4 pt-0 pb-4 bg-secondary">
                <div class="media align-items-end profile-header">
                    <div class="media-body mb-5 text-white text-center">
                        <h4 class="mt-0 mb-0">{{$user->name}}</h4></br>
                        <h5 class="mt-0 mb-0">Email: {{$user->email}}</h5></br>
                        <h5 class="mt-0 mb-0">Gender: {{$user->gender}}</h5></br>
                        <h5 class="mt-0 mb-0">Starting Weight: {{$user->weightStarting}}</h5></br>
                        <h5 class="mt-0 mb-0">Height: {{$user->height}}</h5></br>
                        
                        
                    </div>                  
                </div>
                <div class="col-md-12 text-center">
			<img class="rounded-circle col-xl-6 col-md-6 col-sm-10 mx-auto" alt="Bootstrap Image Preview" src="{{ asset('images/Home.jpg') }}"/>
		</div>         
            </div>      

       </div>
       <div class="row justify-content-center">
	</div>

   

@endsection