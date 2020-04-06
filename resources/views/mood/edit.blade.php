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
    margin-right:250px;
  margin-left: 250px;
  
}

h3{
    margin-top: 30px;
}
</style>

<h3 class="text-center">  Edit Your Mood  </h3>
<form action="{{route('mood.update', $mood->id )}}" method = "post">
            @csrf
                   <div class="form-group">
                    <label for ="date"> Date: </label>
                    <input type="date" class = "form-control" id ="date" name="date" value="{{ $mood->date }}" >
                </div>
                <div class="form-group">
                    <label for ="level">Level:</label>
                    <input type="text" class ="form-control" id="level" name="level" value="{{ $mood->level }}" >
                </div>
                
            <input type="hidden" name="id" value = "{{$mood->id}}">
                <button type="submit" class="btn btn-success">Update</button>

    </form>

@endsection