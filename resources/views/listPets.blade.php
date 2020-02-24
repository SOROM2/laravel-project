<!DOCTYPE html>
<html lang="en">

<head>

</head>

<body>

      <table class="table">
			<tr><th>Name</th><th>Owner</th></tr>
	   @foreach($pets as $pet)
		<tr><td>{{$pet->name}}</td><td>{{$user->name}}</td></tr>
		@endforeach
</table>
</body>

</html>