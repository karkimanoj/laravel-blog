@extends('main')

@section('title', 'Forgot password')

@section('content')
<div class="row">
	<div class="col-md-6 offset-md-3">
		
		<h1> Reset Password </h1>

		<form method="POST" action="{{ route('password.changed') }}">

			{{ csrf_field() }}
			<input type="hidden" name="token" value="{{ $token }}">

			<div class="form-group">
				<label>Email:</label>
				<input type="email" name="email" class="form-control" value="{{ $email }}"><br>
			</div>
			<div class="form-group">
				<label>Password:</label>
				<input type="password" name="password" class="form-control"><br>
			</div>
			<div class="form-group">
				<label>password confirmation:</label>
				<input type="password" name="password_confirmation" class="form-control"><br>
			</div>

			<input type="submit" name="submit" value="Reset password" class="btn btn-primary">
		</form>
	
	</div>
</div>
@endsection