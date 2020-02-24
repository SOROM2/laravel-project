@extends('layouts.app')

@section('content')
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>  
  
      <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      var analytics = <?php echo $type; ?>;
      var analyticsB = <?php echo $level; ?>;
      var analyticsC = <?php echo $hours; ?>;
      var analyticsD = <?php echo $minutes; ?>;
      var analyticsE = <?php echo $kilojoules; ?>;
      var analyticsF = <?php echo $number; ?>;
      var analyticsG = <?php echo $kilograms; ?>;
      
      google.charts.load('current', {'packages':['corechart']});

      google.charts.setOnLoadCallback(drawChart);
      google.charts.setOnLoadCallback(drawChart1);
      google.charts.setOnLoadCallback(drawChart2);
      google.charts.setOnLoadCallback(drawChart3);
      google.charts.setOnLoadCallback(drawChart4);
      google.charts.setOnLoadCallback(drawChart5);
      google.charts.setOnLoadCallback(drawChart6);

      function drawChart() {
        var Piedata = google.visualization.arrayToDataTable(analytics);
        var Pieoptions = {
          title: 'Workout Types',
          width:600,
          height:300,
        };
        var chart = new google.visualization.PieChart(document.getElementById('WorkoutTypechart'));
        chart.draw(Piedata, Pieoptions);
      }
      function drawChart2() {
        var Piedata = google.visualization.arrayToDataTable(analyticsD);
        var Pieoptions = {
          hAxis: {
      format: 'd',
          },
          title: 'Daily total of workout duration',
          width:600,
          height:300,
          legend: {position: 'top'},
          series:{
            0: {color: '#f0ad4e'},
          }
          
        };
        var chart = new google.visualization.ColumnChart(document.getElementById('Durationchart'));
        chart.draw(Piedata, Pieoptions);
      }
      function drawChart3() {
        var Piedata = google.visualization.arrayToDataTable(analyticsC);
        var Pieoptions = {
          title: 'Sleep Tracker',
          width:600,
          height:300,
          legend: {position: 'top'},
          series:{
            0: {color: '#6f9654'},
          }
        };
        var chart = new google.visualization.LineChart(document.getElementById('Sleepchart'));
        chart.draw(Piedata, Pieoptions);
      }
      function drawChart4() {
        var Piedata = google.visualization.arrayToDataTable(analyticsB);
        var Pieoptions = {
          
          title: 'Mood Tracker',
          width:600,
          height:300,
          legend: {position: 'top'},
          series:{
            0: {color: '#5bc0de'},
          }
          
        };

        var chart = new google.visualization.AreaChart(document.getElementById('Moodchart'));
        chart.draw(Piedata, Pieoptions);
      }
      function drawChart5() {
        var Piedata = google.visualization.arrayToDataTable(analyticsE);
        var Pieoptions = {
          title: 'Daily total of kilojoules from snacks',
          width:600,
          height:300,
          legend: {position: 'top'},
          series:{
            0: {color: '#d9534f'},
          }
          
        };
        var chart = new google.visualization.ColumnChart(document.getElementById('snacks'));
        chart.draw(Piedata, Pieoptions);
      }
      function drawChart1() {
        var Piedata = google.visualization.arrayToDataTable(analyticsF);
        var Pieoptions = {
          title: 'Standard Drinks',
          width:600,
          height:300,
          legend: {position: 'top'},
          series:{
            0: {color: '#0275d8'},
          }
        };
        var chart = new google.visualization.ColumnChart(document.getElementById('drinks'));
        chart.draw(Piedata, Pieoptions);
      }
      function drawChart6() {
        var Piedata = google.visualization.arrayToDataTable(analyticsG);
        var Pieoptions = {
          title: 'Weight Tracker',
          width:600,
          height:300,
          legend: {position: 'top'},
          series:{
            0: {color: '#ff4dff'},
          }
        };
        var chart = new google.visualization.LineChart(document.getElementById('Weightchart'));
        chart.draw(Piedata, Pieoptions);
      }
    </script>
  <style>
.bdr {
    margin-top:10px;
    margin-bottom:20px;
    padding:10px;

    border: #cdcdcd medium solid;
    border-radius: 10px;
    -moz-border-radius: 10px;
    -webkit-border-radius: 10px;
}
  </style>
  </head>
  <div class="container-fluid">
	<div class="row">
		<div class="col-md-6"><br>
    <div class="bdr">
    <div id="WorkoutTypechart"></div>
		</div>
    </div>
		<div class="col-md-6"><br>
    <div class="bdr">
    <div id="Durationchart" ></div>
		</div></div>
	</div>
	<div class="row">
		<div class="col-md-6">
    <div class="bdr">
    <div id="Sleepchart" ></div>
		</div></div>
    <div class="col-md-6">
    <div class="bdr">
    <div id="Moodchart" ></div>
		</div>
	</div></div>
	<div class="row">
		<div class="col-md-6">
    <div class="bdr">
    <div id="snacks" ></div>
		</div></div>
		<div class="col-md-6">
    <div class="bdr">
    <div id="drinks" ></div>
		</div></div>
	</div>
  <div class="row justify-content-center">
    <div class="col-md-6">
    <div class="bdr">
    <div id="Weightchart" ></div>
		</div></div>
	</div>
  </div>

@endsection