@extends('main')

@section('title' ,'edit comment ')

@section('stylesheets')
<link rel="stylesheet" type="text/css" href="/css/styles.css">
@endsection

@section('content')
	<div class="row">
		<div class="col-md-8 offset-md-2">
			<h1>Edit comment</h1>
			<form method="POST" action="{{ route('comments.update', [$comment->id]) }}" class="top-spacing-20" >

				{{ csrf_field()}}
				{{ method_field('PUT') }}
				<div class="row">
					<div class="col-md-6 form-group">
						<label>Name:</label>
						<input type="text" name="name" class="form-control" disabled value="{{$comment->name}}">
					</div>
					<div class="col-md-6 form-group">
						<label>Email:</label>
						<input type="email" name="email" class="form-control" value="{{$comment->email}}" disabled>
					</div>
				</div>

				<div class="form-group">
					<label>Comment:</label>
					<textarea name="comment" rows="5" class="form-control" required minlength="5" maxlength="2000">{{$comment->comment}}</textarea>
				</div>
				<input type="submit" name="edit_comment" class="btn btn-success btn-block">
			</form>
		</div>
	</div>
@endsection