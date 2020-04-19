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

<h3 class="text-center">  Edit Your Sleep  </h3>
<form action="{{route('sleep.update', $sleep->id )}}" method = "post">
            @csrf
            
                <div class="form-group">
                    <label for ="date"> Date: </label>
                    <input type="date" class = "form-control" id ="date" name="date" value="{{ $sleep->date }}" >
                </div>
                <div class="form-group">
                    <label for ="hours">Hours:</label>
                    <input type="text" class ="form-control" id="hours" name="hours" value="{{ $sleep->hours }}" >
                </div>              
            <input type="hidden" name="id" value = "{{$sleep->id}}">
                <button type="submit" class="btn btn-success">Update</button>
                <a href="/tables" class="btn btn-primary" >Go Back</a>
                
    </form>

@endsection