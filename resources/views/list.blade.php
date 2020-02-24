<!DOCTYPE html>
<html lang="en">

<head>

</head>

<body>
@if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                    @endif

                    <form role="form" action="{{url()->action('FormController@list')}}" method="post">
				<div class="form-group">
					 {{csrf_field()}}
				
				<button type="submit" class="btn btn-primary">
					Show Pets
				</button>
			</form>
     
</body>

</html>