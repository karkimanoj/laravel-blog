@extends('main')

@section('title','| create posts')

@section('stylesheets')
	<link rel="stylesheet" type="text/css" href="/css/select2.min.css">
	<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
	  <script>
	  	tinymce.init({ selector:'textarea',
	  					menubar:'false',
	  					plugins:'code link' });
	</script>
@endsection

@section('content')
	<div class="row">
		<div class="col-md-8 offset-md-2">
		  <h2>create a new post</h2>	
		  <hr>

		  <form method="POST" action="{{route('posts.store')}}">
			  <div class="form-group">
				<label>Title:</label>	<br>
				<input type="text" name="title" class="form-control" id="titlediv" >
				<div style="color: red"></div>
			  </div>

			  <div class="form-group">
				<label>Slug:</label>	<br>
				<input type="text" name="slug" class="form-control" id="slugdiv" required minlength="5" maxlength="255">
				<div style="color: red"></div>
			  </div>

			  <div class="form-group">
			  	<label>category:</label>
			  	<select class="form-control" required name='category_id'>
			  		@foreach($categories as $category)
			  			<option value="{{ $category->id }}">
			  			    {{$category->name}}
			  			 </option>
			  		@endforeach
			  	</select>
			  </div>

			  <div class="form-group">
			  	<label>tags:</label>
			  	<select class="form-control select2-multi" name='tags[]' multiple="multiple">
			  		@foreach($tags as $tag)
			  			<option value="{{ $tag->id }}">
			  			    {{$tag->name}}
			  			 </option>
			  		@endforeach
			  	</select>
			  </div>

			  <div class="form-group">
				<label>Post body:</label>	<br>
				<textarea class="form-control"  rows="10" name="body" id="bodydiv" > write post here </textarea>
				<div style="color: red"></div>
			  </div>

			  	{{csrf_field()}}
			  <input type="submit" name="submit" value="Post it" class="btn btn-success btn-lg btn-block">
		  </form>
		<!--  alternatively, can also use form helper to generate a form as follows:
		  {!! Form::open(['route' => 'posts.store']) !!}
    			{{ Form::label('title','Title:')}}
    			{{ Form::text('title', null, ['class'=>'form-control'])}}</br>
    			{{ Form::label('body','post body:')}}
    			{{ Form::textarea('body', null, ['class'=>'form-control'])}} </br>
    			{{Form::submit('post it',['class'=>'btn btn-success btn-lg btn-block'])}}
          {!! Form::close() !!}
          --> 
		</div>	
	</div>
	
@endsection

@section('scripts')
	<script type="text/javascript" src='/js/create.js'></script>
	<script type="text/javascript" src='/js/select2.min.js'></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('.select2-multi').select2();
		});
	</script>

@endsection