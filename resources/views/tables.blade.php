@extends('layouts.app')

@section('content')
<style>
.nav-tabs {
    border-radius: 5px;
}
.nav-tabs>.active>a,
.nav-tabs>.active>a:hover,
.nav-tabs>.active>a:focus {
    border-color: #d45500;
    
}

.nav-tabs>ul {
    float: none;
    display: inline-block;
    zoom: 1;
    
}

.nav-tabs {
    text-align: center;
}
.nav-link{
    color:black;
}
.nav-link>.active{
    color:black;
    font-weight:700;
}
}
.bg {
    /* The image used */
    background-image: url("{{URL::asset('images/Home.jpg')}}");

    /* Half height */
    height: auto;

    /* Center and scale the image nicely 
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;*/
}

table.table-bordered {
    border: 1px solid black;
    margin-top: 20px;
}

table.table-bordered>thead>tr>th {
    border: 1px solid black;
    text-align: center;
}

table.table-bordered>tbody>tr>td {
    border: 1px solid black;
    text-align: center;
}

.bdr {
    margin-top: 30px;
    padding: 10px;

    border: #cdcdcd medium solid;
    border-radius: 10px;
    -moz-border-radius: 10px;
    -webkit-border-radius: 10px;
}

h3 {
    padding: 10px;
    color: rgb(41, 43, 44);
}
.card-header, .card-title{
    font-weight:700;
}
.mood{
    background-color:#46a046;
}
.sleep{
    background-color:#41b5d8;
}
.workout{
    background-color:#ed9c2c;
}
.snack{
    background-color:#d1332e;
}
.drink{
    background-color:#025fb1;
}
.weight{
    background-color:#ff4dff;
}
.weight-data{
    background-color:#ffb3ff;
}
.nav-tabs .nav-link:not(.active) {
    border-color: transparent !important;
}
</style>
<div class="bg">
    <div class="container-fluid">
        <div class="row">
            <br><br>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-3 text-center">

                <div class="card border-success" style="width:300px">
                    <div class="card-header">Lifetime Stats</div>
                    <div class="card-body text-success">
                        <h4 class="card-title">{{$totalDuration}} mins</h4>
                    </div>
                    <div class="card-footer">Total Workouts Duration</div>
                </div>
            </div>
            <div class="col-md-3 text-center">
                <div class="card border-danger" style="width:300px">
                    <div class="card-header">Lifetime Stats</div>
                    <div class="card-body text-danger">
                        <h4 class="card-title">{{$totalDistance}} kms</h4>
                    </div>
                    <div class="card-footer">Total Workouts Distance</div>
                </div>
            </div>
            <div class="col-md-3 text-center">
                <div class="card border-warning" style="width:300px">
                    <div class="card-header">Personal Best</div>
                    <div class="card-body text-warning">
                        <h4 class="card-title">{{$maxDuration}} mins</h4>
                    </div>
                    <div class="card-footer">Longest Workout Duration</div>
                </div>
            </div>
            <div class="col-md-3 text-center">
                <div class="card border-info" style="width:300px">
                    <div class="card-header">Personal Best</div>
                    <div class="card-body text-info">
                        <h4 class="card-title">{{$maxDistance}} kms</h4>
                    </div>
                    <div class="card-footer">Longest Workout Distance</div>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-12 text-center"><br><br>

        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md">
            <div class="bdr">
                <h3 class="text-center">
                    Lifestyle Logger Tables
                    
                </h3>
                @if ($message = Session::get('success'))
            <br>
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">close</button>
                <strong>{{ $message }}</strong>
            </div>

            @endif
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active border border-success " data-toggle="tab" href="#home">Mood</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link border border-info " data-toggle="tab" href="#menu1">Sleep</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link border border-warning " data-toggle="tab" href="#menu2">Workouts</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link border border-danger " data-toggle="tab" href="#menu3">Snacks</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link border border-primary " data-toggle="tab" href="#menu4">Drinks</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link border border-secondary" data-toggle="tab" href="#menu5">Weight</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link border border-secondary" data-toggle="tab" href="#menu6">Summaries</a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div id="home" class="container tab-pane active"><br>
                        <table class="table table-bordered">
                            <thead>
                                <tr class="mood">
                                    <th> id </th>
                                    <th>Date</th>
                                    <th>Level</th>
                                    <th>Edit</th>
                                    <th>Delete</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($moods as $mood)
                                <tr>
                                    <td class ="table-success">{{$mood->id}}</td>
                                    <td class="table-success">{{$mood->date}}</td>
                                    <td class="table-success">{{$mood->level}}</td>  
                                    <td class ="table-success"><a href="/mood/{{$mood->id}}/edit" class="btn btn-primary">Edit Mood</a></td>
                                    <td class ='table-success'>
                                    <form action="{{action('MoodController@destroy', $mood->id)}}" method="post">
                                        {{csrf_field()}}
                                         <input name="_method" type="hidden" value="DELETE">
                                        <button class="btn btn-danger" type="submit">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div id="menu1" class="container tab-pane fade"><br>
                        <table class="table table-bordered">
                            <thead>
                                <tr class="sleep">
                                    <th> id </th>
                                    <th>Date</th>
                                    <th>hours</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($sleeps as $sleep)
                                <tr>
                                    <td class ="table-info">{{$sleep->id}}</td>
                                    <td class="table-info">{{$sleep->date}}</td>
                                    <td class="table-info">{{$sleep->hours}}</td>
                                    <td class ="table-info"><a href="/sleep/{{$sleep->id}}/edit" class="btn btn-primary">Edit Sleep</a></td>
                                    <td class ='table-info'>
                                    <form action="{{action('SleepController@destroy', $sleep->id)}}" method="post">
                                        {{csrf_field()}}
                                         <input name="_method" type="hidden" value="DELETE">
                                        <button class="btn btn-danger" type="submit">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    <div id="menu2" class="container tab-pane fade"><br>
                        <table class="table table-bordered">
                            <thead>
                                <tr class="workout">
                                    <th> id </th>
                                    <th>Date</th>
                                    <th>Activity</th>
                                    <th>Duration</th>
                                    <th>Distance</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($workouts as $workout)
                                <tr>
                                    <td class ="table-warning">{{$workout->id}}</td>
                                    <td class="table-warning">{{$workout->date}}</td>
                                    <td class="table-warning">{{$workout->type}}</td>
                                    <td class="table-warning">{{$workout->minutes}}</td>
                                    <td class="table-warning">{{$workout->kilometres}}</td>
                                    <td class ="table-warning"><a href="/workout/{{$workout->id}}/edit" class="btn btn-primary">Edit Workout</a></td>
                                    <td class ='table-warning'>
                                    <form action="{{action('WorkoutController@destroy', $workout->id)}}" method="post">
                                        {{csrf_field()}}
                                         <input name="_method" type="hidden" value="DELETE">
                                        <button class="btn btn-danger" type="submit">Delete</button>
                                        </form>
                                    </td>
                                    
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div id="menu3" class="container tab-pane fade"><br>
                        <table class="table table-bordered">
                            <thead>
                                <tr class="snack">
                                    <th> id </th>
                                    <th>Date</th>
                                    <th>Item</th>
                                    <th>Kilojoules</th>
                                    <th>Calories</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($snacks as $snack)
                                <tr>
                                    <td class ="table-danger">{{$snack->id}}</td>
                                    <td class="table-danger">{{$snack->date}}</td>
                                    <td class="table-danger">{{$snack->type}}</td>
                                    <td class="table-danger">{{$snack->kilojoules}}</td>
                                    <td class="table-danger">{{$snack->calories}}</td>
                                    <td class ="table-danger"><a href="/snack/{{$snack->id}}/edit" class="btn btn-primary">Edit Snack</a></td>
                                    <td class ='table-danger'>
                                    <form action="{{action('SnackController@destroy', $snack->id)}}" method="post">
                                        {{csrf_field()}}
                                         <input name="_method" type="hidden" value="DELETE">
                                        <button class="btn btn-danger" type="submit">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div id="menu4" class="container tab-pane fade"><br>
                        <table class="table table-bordered">
                            <thead>
                                <tr class="drink">
                                    <th> id </th>
                                    <th>Date</th>
                                    <th>Item</th>
                                    <th>Std Drinks</th>
                                    <th>Kilojoules</th>
                                    <th>Calories</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($drinks as $drink)
                                <tr>
                                    <td class ="table-primary">{{$drink->id}}</td>
                                    <td class="table-primary">{{$drink->date}}</td>
                                    <td class="table-primary">{{$drink->type}}</td>
                                    <td class="table-primary">{{$drink->number}}</td>
                                    <td class="table-primary">{{$drink->kilojoules}}</td>
                                    <td class="table-primary">{{$drink->calories}}</td>
                                    <td class ="table-primary"><a href="/drink/{{$drink->id}}/edit" class="btn btn-primary">Edit Drink</a></td>
                                    <td class ='table-primary'>
                                    <form action="{{action('DrinkController@destroy', $drink->id)}}" method="post">
                                        {{csrf_field()}}
                                         <input name="_method" type="hidden" value="DELETE">
                                        <button class="btn btn-danger" type="submit">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div id="menu5" class="container tab-pane fade"><br>
                        <table class="table table-bordered">
                            <thead>
                                <tr class="weight">
                                    <th> id </th>
                                    <th>Date</th>
                                    <th>Weight</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($weights as $weight)
                                <tr>
                                    <td class ="weight-data">{{$weight->id}}</td>
                                    <td class="weight-data">{{$weight->date}}</td>
                                    <td class="weight-data">{{$weight->Kilograms}}
                                    <td class ="weight-data"><a href="/weight/{{$weight->id}}/edit" class="btn btn-primary">Edit Weight</a></td>
                                    <td class ='weight-data'>
                                    <form action="{{action('WeightController@destroy', $weight->id)}}" method="post">
                                        {{csrf_field()}}
                                         <input name="_method" type="hidden" value="DELETE">
                                        <button class="btn btn-danger" type="submit">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div id="menu6" class="container tab-pane fade"><br>
                        <table class="table table-bordered">
                            <thead>
                                <tr class="mood">
                                    <th></th>
                                    <th>Last 7 Days</th>
                                    <th>Last 30 Days</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                <tr>
                                    <td class="table-success">Sleep (hours)</td>
                                    <td class="table-success">{{$totalSleep}}
                                    <td class="table-success">{{$ZSleep}}
                                </tr>
                                <tr>
                                    <td class="table-success">Workout Duration (minutes)</td>
                                    <td class="table-success">{{$tDuration}}
                                    <td class="table-success">{{$ZDuration}}
                                </tr>
                                <tr>
                                    <td class="table-success">Workout Distance (kilometres)</td>
                                    <td class="table-success">{{$tDistance}}
                                    <td class="table-success">{{$ZDistance}}
                                </tr>
                                <tr>
                                    <td class="table-success">Energy from Snacks (kilojoules)</td>
                                    <td class="table-success">{{$totalKilojoules}}
                                    <td class="table-success">{{$ZKilojoules}}
                                </tr>
                                <tr>
                                    <td class="table-success">Standard Drinks</td>
                                    <td class="table-success">{{$totalDrinks}}
                                    <td class="table-success">{{$ZDrinks}}
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection