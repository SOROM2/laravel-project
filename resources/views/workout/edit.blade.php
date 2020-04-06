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
<h3 class="text-center">  Edit Your Workout  </h3>
<form action="{{route('workout.update', $workout->id )}}" method = "post">
            @csrf
            
                <div class="form-group">
                    <label for ="date"> Date: </label>
                    <input type="date" class = "form-control" id ="date" name="date" value="{{ $workout->date }}" >
                </div>
                <div class="form-group">
                    <label for ="minutes">Minutes:</label>
                    <input type="text" class ="form-control" id="minutes" name="minutes" value="{{ $workout->minutes }}" >
                </div>
                <div class="form-group">
                    <label for ="type">Kilometres:</label>
                    <input type="text" class ="form-control" id="type" name="type" value="{{ $workout->type }}" >

                </div>    
                <div class="form-group">
                    <label for ="kilometres">Kilometres:</label>
                    <input type="text" class ="form-control" id="kilometres" name="kilometres" value="{{ $workout->kilometres }}" >

                </div>              
            <input type="hidden" name="id" value = "{{$workout->id}}">
                <button type="submit" class="btn btn-success">Update</button>
                <a href="/tables" class="btn btn-primary" >Go Back</a>
                

    </form>

@endsection