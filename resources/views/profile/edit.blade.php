@extends('layouts.app')

@section('content')
<style>
.form-group {
  margin-top: 30px;
  margin-right:250px;
  margin-left: 250px;
}

.btn-success{
    margin-top: 30px;
    margin-right:30px;
  margin-left: 250px;
  
}

h3{
    margin-top: 30px;
}

.btn-primary{
    margin-top: 30px;
    margin-right:250px;
  margin-left: 30px;
}
</style>     
    
<h3 class="text-center">  Edit Your Profile </h3>
<form action="/profile/{{$user->username}}/update" method = "post">
            @csrf
        
                <div class="form-group">
                    <label for="username">Username: </label>
                    <input type="text" class = "form-control" id ="username" name="username" value="{{ $user->username }}" >
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="text" class ="form-control" id="email" name="email" value="{{ $user->email}}" >
                </div>              

                 <div class="form-group">
                    <label for="gender">Gender:</label>
                    <div class="col-lg-6" id="gender">
                        <?php
                            $other = False;
                        ?>
                        <input  type="radio" id="male" name="gender" value="male" {{ ($user->gender === "male") ? 'checked' : '' }}>
                        <label class="radiolabel" for="male">{{ __('Male') }}</label>

                        <input type="radio" id="female" name="gender" value="female" {{ ($user->gender === "female") ? 'checked' : $other = True }}>
                        <label class="radiolabel"  for="female">{{ __('Female') }}</label>

                        <input type="radio" id="other" name="gender" value="other" {{ ($other === True ) ? 'checked' : '' }}>
                        <label class="radiolabel" for="other">{{ __('Other') }}</label>
                    </div>
                </div>              
                
                <div class="form-group">
                    <label for="biography">Bio:</label>
                    <input type="textfield" class ="form-control" id="biography" name="biography" value="{{ $user->biography }}" >
                </div>              

                <button type="submit" class="btn btn-success">Update</button>
                <a href="/profile/{{$user->username}}" class="btn btn-primary" >Go Back</a>
                
    </form>

@endsection
