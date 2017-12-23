@extends('main')

@section('title','|'.$post->title)

@section('stylesheets')
<link rel="stylesheet" type="text/css" href="/css/styles.css">
@endsection

@section('content')
	<div class="row">
		<div class="col-md-8 offset-md-2">
			<h1>{{ $post->title }}</h1>
			<p> {{ $post->body }}</p>
			<hr>
			<strong>Posted in: </strong> {{ $post->category['name']}}
		</div>
	</div>

	<div class="row">
		<div class="col-md-8 offset-md-2">
			<div class="comment-title top-spacing-30">
				<h3><span class="glyphicon glyphicon-comment"></span>{{ $post->comments()->count() }} comments</h3>
			</div>
			@foreach($post->comments as $comment)
				<div class="media top-spacing-20">

					  <img src="{{ "https://www.gravatar.com/avatar/" . md5(strtolower(trim($comment->email))) . "?s=50&d=monsterid" }}" class=" mr-3 author-image">

					  <div class="media-body">
						    <h4 class="mt-0">{{ $comment->name }}</h4>
						    <p class="author-time"> {{ date('F nS, Y - g:iA' , strtotime($comment->created_at)) }}</p>
						   <div class="comment-content">
						   	{{ $comment->comment }}
						   </div>
					  </div>

				</div>
			
			@endforeach
			</div>
		</div>

	<div class="row">
		<div class="col-md-8 offset-md-2">
			<form method="POST" action="{{ route('comments.store', $post->id) }}" class="top-spacing-20">

				{{ csrf_field()}}
				<div class="row">
					<div class="col-md-6 form-group">
						<label>Name:</label>
						<input type="text" name="name" class="form-control" required maxlength="255">
					</div>
					<div class="col-md-6 form-group">
						<label>Email:</label>
						<input type="email" name="email" class="form-control" required maxlength="255">
					</div>
				</div>

				<div class="form-group">
					<label>Comment:</label>
					<textarea name="comment" rows="5" class="form-control" required minlength="5" maxlength="2000"></textarea>
				</div>
				<input type="submit" name="add_comment" class="btn btn-success btn-block">
			</form>
		</div>
	</div>
@endsection