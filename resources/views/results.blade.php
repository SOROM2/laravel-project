<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>NZ Cricket Info</title>

    <meta name="description" content="Source code generated using layoutit.com">
    <meta name="author" content="LayoutIt!">

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
<style>
.jumbotron {
	
	background-image: url("images/NZLogo2.jpg");
}
body {
	background-color:rgb(78, 74, 74);
}

</style>
  </head>
  <body>
  <div class="row">
		<div class="col-md-12">
			<div class="jumbotron">
			<img src="">
				<h2 class="text-center">
					2019 New Zealand Cricket Team
				</h2>
				<h3 class="text-center">
					Selected Role: {{$role}}
				</h3>
			</div>
		</div>
	</div>
	<div class="bg">
    <div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="row justify-content-center">
			@foreach($results as $player)
				<div class="col-md-2">
					<div class="card">
					<? $pic={{$player->image}} ?>
						<img class="card-img-top" alt="Bootstrap Thumbnail First" src="images/guptil.jpg">
						<div class="card-block">
							<h5 class="card-title text-center">
							{{$player->name}}
							</h5>
							<p class="card-text">
							Age: {{$player->age}}<br>
							Bats: {{$player->batting}}<br>
							Bowls: {{$player->bowling}}<br>
							Role: {{$player->role}}<br>
							ODI Runs: {{$player->odiRuns}}<br>
							</p>
						</div>
					</div>
				</div>
				@endforeach
		</div>
		<div class="col-12 text-center">
		<a class="btn btn-primary btn-large" href="/">Search again</a><br><br>
		</div>
	</div>
</div>
</div>
</div>
    <script src="js/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
  </body>
</html>