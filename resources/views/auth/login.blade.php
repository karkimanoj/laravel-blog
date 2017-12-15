@extends('main')

@section('title','login ')

@section('content')

<div class="row">
	<div class="col-md-6 offset-md-3">
		<form method="POST" action="{{ route('login.post') }}" >
			{{ csrf_field() }}
			<div class="form-group">
				<label>Email:</label>
				<input type="email" name="email" class="form-control">
			</div>
			<div class="form-group">
				<label>Password:</label>
				<input type="password" name="password" class="form-control">
			</div>
			<div class="form-group">
				<input type="checkbox" name="remember" > Remember me
			</div>
			<input type="submit" name="login" value="login" class="btn btn-primary btn-block">

			<a href="{{ route('password.request') }}"> forgot password </a>
		</form>
	</div>
</div>
@endsection