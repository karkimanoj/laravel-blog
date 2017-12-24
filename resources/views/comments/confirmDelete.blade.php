@extends('main')

@section('title','| confirm delete')

@section('stylesheets')
<link rel="stylesheet" type="text/css" href="/css/styles.css">
@endsection

@section('content')
	<div class="row">
		<div class="col-md-8 offset-md-2">
			<h1>Delete this comment?</h1>
			<h5>Name: {{ $comment->name }}</h5>
			<h5>Email: {{ $comment->email }}</h5>
			<p>{{ $comment->comment }}</p>

			<form method="POST" action="{{ route('comments.destroy', $comment->id) }}">
				{{ method_field('DELETE') }}
				{{ csrf_field() }}
				<input type="submit" name="delete" value="yes delete it." class="btn btn-danger btn-block">
			</form>
		</div>
	</div>
@endsection