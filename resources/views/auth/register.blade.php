@extends('main')

@section('title','login ')

@section('content')
<h1>Register Here</h1>
<div class="row">
	<div class="col-md-6 offset-md-3">
		<form method="POST" action="{{ route('register.post') }}">
			{{ csrf_field() }}
			<div class="form-group">
				<label>Name</label>
				<input type="text" name="name" class="form-control">
			</div>
			<div class="form-group">
				<label>Email:</label>
				<input type="email" name="email" class="form-control">
			</div>
			<div class="form-group">
				<label>Password:</label>
				<input type="password" name="password" class="form-control">
			</div>
			<div class="form-group">
				<label>Confirm password:</label>
				<input type="password" name="password_confirmation" class="form-control">
			</div>
			<input type="submit" name="register" value="register" class="btn btn-primary btn-block">
		</form>
	</div>
</div>
@endsection