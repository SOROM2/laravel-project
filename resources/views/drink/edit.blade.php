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

<h3 class="text-center">  Edit Your Drink  </h3>
<form action="{{route('drink.update', $drink->id )}}" method = "post">
            @csrf
            
                <div class="form-group">
                    <label for ="date"> Date: </label>
                    <input type="date" class = "form-control" id ="date" name="date" value="{{ $drink->date }}" >
                </div>
                <div class="form-group">
                    <label for ="number">Number:</label>
                    <input type="text" class ="form-control" id="number" name="number" value="{{ $drink->number }}" >
                </div>
                <div class="form-group">
                    <label for ="kilojoules">Kilojoules:</label>
                    <input type="text" class ="form-control" id="kilojoules" name="kilojoules" value="{{ $drink->kilojoules }}" >

                </div>
                <div class="form-group">
                    <label for ="calories">Calories:</label>
                    <input type="text" class ="form-control" id="calories" name="calories" value="{{ $drink->calories}}" >
                </div>
                
            <input type="hidden" name="id" value = "{{$drink->id}}">
                <button type="submit" class="btn btn-success">Update</button>
                <a href="/tables" class="btn btn-primary" >Go Back</a>
                

    </form>

@endsection