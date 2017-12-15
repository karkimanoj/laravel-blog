@extends('main')

@section('title', 'Forgot password')

@section('content')
<div class="row">
	<div class="col-md-6 offset-md-3">
		<div class="panel panel-default">
			<div class="panel-heading"><h1> Reset Password </h1></div>
			<div class="panel-body">
				@if(session('status'))
				 <div class="alert alert-success">
				 	{{ session('status') }}
				 </div>
				@endif
				<form method="POST" action="{{ route('password.email') }}">
					 {{ csrf_field() }}
					<label>Email:</label>
					<input type="email" name="email" class="form-control"><br>
					<input type="submit" name="submit" value="Reset password" class="btn btn-primary">
				</form>
			</div>
		</div>
	</div>
</div>
@endsection