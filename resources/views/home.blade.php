@extends('layouts.app')

@section('content')

<head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
    var analytics = <?php echo $minutes; ?>;
    var analyticsB = <?php echo $myMinutes; ?>;
    var analyticsC = <?php echo $hours; ?>;
    google.charts.load('current', {
        'packages': ['gauge']
    });
    google.charts.setOnLoadCallback(drawChart);
    google.charts.setOnLoadCallback(drawChart2);
    google.charts.setOnLoadCallback(drawChart3);

    function drawChart() {

        var data = google.visualization.arrayToDataTable(analytics);
        var options = {
            title: 'dur',
            min: 0,
            max: 75,
            width: 400,
            height: 150,
            greenFrom: 30,
            greenTo: 75,
            redFrom: 0,
            redTo: 20,
            yellowFrom: 20,
            yellowTo: 30,
        };
        var chart = new google.visualization.Gauge(document.getElementById('chart_div1'));
        chart.draw(data, options);
    }
    function drawChart2() {
        var data = google.visualization.arrayToDataTable(analyticsB);
        var options = {
            min: 0,
            max: 75,
            width: 400,
            height: 150,
            greenFrom: 30,
            greenTo: 75,
            redFrom: 0,
            redTo: 20,
            yellowFrom: 20,
            yellowTo: 30,
        };
        var chart = new google.visualization.Gauge(document.getElementById('chart_div2'));
        chart.draw(data, options);
    }
    function drawChart3() {
        var data = google.visualization.arrayToDataTable(analyticsC);
        var options = {
            min: 0,
            max: 12,
            width: 400,
            height: 150,
            greenFrom: 7,
            greenTo: 12,
            redFrom: 0,
            redTo: 7,
        };
        var chart = new google.visualization.Gauge(document.getElementById('chart_div3'));
        chart.draw(data, options);
    }
</script>  

<style>
.nav-pills {
    margin-top: 20px;
}
/* active (faded) */
.nav-pills .pill-1 .active {
    background-color: rgb(240, 173, 78);
    color: white;
}
.nav-pills .pill-2 .active {
    background-color: rgb(92, 184, 92);
}

.nav-pills .pill-3 .active {
    background-color: rgb(91, 192, 222);
    color: white;
}
.nav-pills .pill-4 .active {
    background-color: rgb(217, 83, 79);
    color: white;
}
.nav-pills .pill-5 .active {
    background-color: rgb(2, 117, 216);
    color: white;
}
.nav-pills .pill-6 .active {
    background-color: rgb(41, 43, 44);
    color: white;
}
.center {
    display: block;
    margin-left: auto;
    margin-right: auto;
    margin-bottom: 20px;
    width: 30%;
}
.cform {
    text-align: center;

}
.nav-link {
    color: black;
}
.bdr {
    margin-top: 30px;
    padding: 10px;
    border: #cdcdcd medium solid;
    border-radius: 10px;
    -moz-border-radius: 10px;
    -webkit-border-radius: 10px;
}
</style>
</head>
<div class="container-fluid">

    <div class="row">
        <div class="col-4">
            <div class="bdr">
                <h3 class="text-center">
                    Other LUX users
                </h3><br>
                <div class="center">
                    <div id="chart_div1" style="width: 500px; height: 180px;"></div>
                </div>
                <p class="text-center">Average workout duration for our other users. <br>Are you leading the way, or chasing the pack?</p>
            </div>
        </div>
        <div class="col-4">
            <div class="bdr">
                <h3 class="text-center">
                    My Workout Target
                </h3><br>
                <div class="center">
                    <div id="chart_div2" style="width: 500px; height: 180px;"></div>
                </div>
                <p class="text-center">Here's your average workout time.<br> The target amount is 30 minutes a day.</p>
            </div>
        </div>
        <div class="col-4">
            <div class="bdr">
                <h3 class="text-center">
                    Sleep Target
                </h3><br>
                <div class="center">
                    <div id="chart_div3" style="width: 500px; height: 180px;"></div>
                </div>
                <p class="text-center">Here's your average hours of sleep time.<br>Your sleep target is 7 hours per night.</p>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-6">

            <!--Return success message if form submits-->
            @if ($message = Session::get('success'))
            <br>
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">close</button>
                <strong>{{ $message }}</strong>
            </div>

            @endif

            <!--Return warning message if coach isnt happy-->
            @if ($message = Session::get('warning'))
            <br>
            <div class="alert alert-danger alert-block">
                <button type="button" class="close" data-dismiss="alert">close</button>
                <strong>{{ $message }}</strong>
            </div>

            @endif
        </div>
    </div>

    <div class="row">
        <div class="col-6">
            <div class="bdr">
                <h3 class="text-center">
                    Record your life
                </h3>
                <ul class="nav nav-pills" role="tablist">
                    <li class="nav-item pill-2"><a class="nav-link active" data-toggle="tab" href="#home">Mood</a></li>
                    <li class="nav-item pill-3"><a class="nav-link" data-toggle="tab" href="#menu1">Sleep</a></li>
                    <li class="nav-item pill-1"><a class="nav-link" data-toggle="tab" href="#menu2">Workout</a></li>
                    <li class="nav-item pill-4"><a class="nav-link" data-toggle="tab" href="#menu3">Snacks</a></li>
                    <li class="nav-item pill-5"><a class="nav-link" data-toggle="tab" href="#menu4">Drinks</a></li>
                    <li class="nav-item pill-6"><a class="nav-link" data-toggle="tab" href="#menu5">Weight</a></li>
                </ul>
                <div class="tab-content">
                    <div id="home" class="container tab-pane in active">
                        <form action="{{url()->action('FormController@store')}}" method="POST">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="date">Date</label>
                                <input type="date" class="form-control" id="date" placeholder="Enter date" name="date">
                            </div>
                            <div class="form-group">
                                <label for="level">Mood:</label>
                                <input type="text" class="form-control" id="level"
                                    placeholder="Enter mood level (1 - 10)" name="level">
                                    @if ($errors->has('level'))
                                        <span style="color:red;">
                                         {{ $errors->first('level') }}
                                        </span>
                                     @endif  
                            </div>
                          <button type="submit" name="mood" value="mood" class="btn btn-secondary">Submit</button>
                        </form>


                    </div>

                    <div id="menu1" class="container tab-pane">
                        <form action="{{url()->action('FormController@store')}}" method="POST">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="date">Date</label>
                                <input type="date" class="form-control" id="date" placeholder="Enter date" name="date">
                            </div>
                            <div class="form-group">
                                <label for="hours">Sleep:</label>
                                <input type="number" class="form-control" id="hours" placeholder="Enter sleep hours"
                                    name="hours">
                                @if ($errors->has('hour'))
                                    <span style="color:red;">
                                        {{ $errors->first('hour') }}
                                    </span>
                                @endif
                            </div>


                            <button type="submit" name="sleep" value="sleep" class="btn btn-secondary">Submit</button>
                        </form>

                    </div>
                    <div id="menu2" class="container tab-pane">
                        <form action="{{url()->action('FormController@store')}}" method="POST">
                            <div class="form-group">
                                {{csrf_field()}}
                                <label for="date">Date</label>
                                <input type="date" class="form-control" id="date" placeholder="Enter date" name="date">
                            </div>
                            <div class="form-group">
                                <label for="type">Activity:</label>
                                <input type="text" class="form-control" id="type" placeholder="Enter activity"
                                    name="type">
                            </div>
                            <div class="form-group">
                                <label for="minutes">Duration:</label>
                                <input type="text" class="form-control" id="minutes"
                                    placeholder="Enter duration in minutes" name="minutes">
                            </div>
                            <div class="form-group">
                                <label for="kilometres">Distance:</label>
                                <input type="text" class="form-control" id="kilometres"
                                    placeholder="Enter distance in kilometres" name="kilometres">
                            </div>
                            <button type="submit" name="workout" value="workout"
                                class="btn btn-secondary">Submit</button>
                        </form>


                    </div>
                    <div id="menu3" class="container tab-pane">
                        <form action="{{url()->action('FormController@store')}}" method="POST">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="date">Date</label>
                                <input type="date" class="form-control" id="date" placeholder="Enter date" name="date">
                            </div>
                            <div class="form-group">
                                <label for="type">Type</label>
                                <input type="text" class="form-control" id="type" placeholder="Enter snack type"
                                    name="type">
                            </div>
                            <div class="form-group">
                                <label for="kilojoules">Kilojoules</label>
                                <input type="number" class="form-control" id="kilojoules"
                                    placeholder="Enter number of kilojoules" name="kilojoules">
                            </div>
                            <div class="form-group">
                                <label for="calories">Calories</label>
                                <input type="number" class="form-control" id="calories"
                                    placeholder="Enter number of calories" name="calories">
                            </div>

                            <button type="submit" name="snack" value="snack" class="btn btn-secondary">Submit</button>
                        </form>
                    </div>
                    <div id="menu4" class="container tab-pane">
                        <form action="{{url()->action('FormController@store')}}" method="POST">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="date">Date</label>
                                <input type="date" class="form-control" id="date" placeholder="Enter date" name="date">
                            </div>
                            <div class="form-group">
                                <label for="type">Type</label>
                                <input type="text" class="form-control" id="type" placeholder="Enter drink type"
                                    name="type">
                            </div>
                            <div class="form-group">
                                <label for="kilojoules">Number</label>
                                <input type="number" class="form-control" id="number"
                                    placeholder="Enter number of Std Drinks" name="number">
                            </div>
                            <div class="form-group">
                                <label for="kilojoules">Kilojoules</label>
                                <input type="number" class="form-control" id="kilojoules"
                                    placeholder="Enter number of kilojoules" name="kilojoules">
                            </div>
                            <div class="form-group">
                                <label for="calories">Calories</label>
                                <input type="number" class="form-control" id="calories"
                                    placeholder="Enter number of calories" name="calories">
                            </div>

                            <button type="submit" name="drink" value="drink" class="btn btn-secondary">Submit</button>
                        </form>
                    </div>
                    <div id="menu5" class="container tab-pane">
                        <form action="{{url()->action('FormController@store')}}" method="POST">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="date">Date</label>
                                <input type="date" class="form-control" id="date" placeholder="Enter date" name="date">
                            </div>
                            <div class="form-group">
                                <label for="Kilograms">Weight</label>
                                <input type="text" class="form-control" id="Kilograms"
                                    placeholder="Enter weight in Kilograms" name="Kilograms">
                            </div>


                            <button type="submit" name="weight" value="weight" class="btn btn-secondary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="bdr">
                <h3 class="text-center">
                    Ask the coach
                </h3>
                <img class="center" alt="Bootstrap Image Preview" src="images/coach.png" />
                <p class="text-center">
                    <strong>Choose an area to get the coach's feedback</strong>
                </p>
                <div class="cform">
                    <form action="{{url()->action('FormController@store')}}" method="POST">
                        {{csrf_field()}}

                        <p>
                            <button type="submit" class="btn btn-success" name="coachMood"
                                value="coachMood">Mood</button>
                            <button type="submit" class="btn btn-info" name="coachSleep"
                                value="coachSleep">Sleep</button>
                            <button type="submit" class="btn btn-warning" name="coachWorkout"
                                value="coachWorkout">Workouts</button>
                            <button type="submit" class="btn btn-danger" name="coachSnack"
                                value="coachSnack">Snacks</button>
                            <button type="submit" class="btn btn-primary" name="coachDrink"
                                value="coachDrink">Drinks</button>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>



@endsection
