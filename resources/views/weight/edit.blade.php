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

<h3 class="text-center">  Edit Your Weight  </h3>
<form action="{{route('weight.update', $weight->id )}}" method = "post">
            @csrf
            
                <div class="form-group">
                    <label for ="date"> Date: </label>
                    <input type="date" class = "form-control" id ="date" name="date" value="{{ $weight->date }}" >
                </div>
                <div class="form-group">
                    <label for ="Kilograms">Kilograms:</label>
                    <input type="text" class ="form-control" id="Kilograms" name="Kilograms" value="{{ $weight->Kilograms }}" >
                </div>
                
            <input type="hidden" name="id" value = "{{$weight->id}}">
                <button type="submit" class="btn btn-success">Update</button>
                <a href="/tables" class="btn btn-primary" >Go Back</a>
                

    </form>

@endsection