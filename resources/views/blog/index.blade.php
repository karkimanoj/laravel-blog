@extends('main')

@section('title', '| blogs')

@section('content')
<div class="row">
	<div class="col-md-8 offset-md-2">
		<center><h1>Blogs</h1></center>
	</div>
</div>

@foreach($posts as $post)
<div class="row">
	<div class="col-md-8 offset-md-2">
		<h2>{{ $post->title }}</h1>
		<h6> published: {{ date('M i Y', strtotime($post->created_at)) }} </h6>
		<p>{{ substr(strip_tags($post->body), 0, 300) }} {{ strlen(strip_tags($post->body))>300?'....':'' }}</p>
		<a href="{{ route('blog.single', $post->slug) }}" class="btn btn-primary">read more</a>
		<hr>
	</div>
</div>
@endforeach

<div class="row">
	<div class="col-md-8">
		<div class="text-center">
			{!! $posts->links('vendor.pagination.bootstrap-4') !!} 
	  		page {{ $posts->currentPage() }} of {{ $posts->lastpage()}} pages
		</div>
	</div>
</div>
@endsection