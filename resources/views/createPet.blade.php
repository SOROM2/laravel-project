<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Pet</title>
</head>
<body>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<form role="form" action="{{url()->action('FormController@store')}}" method="post">
				<div class="form-group">
					 {{csrf_field()}}
					<label for="name">
						Pet Name
					</label>
					<input type="text" class="form-control" id="name" name="name" />
				</div>
				<div class="form-group">
					 
					
				<button type="submit" class="btn btn-primary">
					Submit
				</button>
			</form>
		</div>
	</div>
</div>
    
</body>
</html>