@extends('main')

@section('titile','| all posts')

@section('content')
 <div class="row">
 	<div class="col-md-10"> 
 	  <h1>All Posts here</h1>
    </div>
    <div class="col-md-2">
    	<a href="{{route('posts.create')}}" class="btn btn-primary btn-lg btn-block"> create post </a>
    </div>
 </div>

 <div class="row">
    <div class="col-md-12">

	  <table class="table">
	  	 <thead>
	  	   <tr>
		  	 	<th>id</th>
		  	 	<th>title</th>
		  	 	<th>body</th>
		  	 	<th>created at</th>
		  	 	<th></th>
	  	    </tr>
	  	 </thead>
	  	 <tbody>
	  	 	
	  	 	  @foreach($posts as $post)
	  	 	  <tr>
			 	<td>{{ $post->id }}</td>
			 	<td>{{ $post->title }}</td>
			 	<td>{{ substr(strip_tags($post->body),0,50) }} <span style="color: blue"> {{ strlen(strip_tags($post->body))>50?'....':'' }} </span></td>
			 	<td>{{ $post->created_at }}</td>
			 	<td><a href="{{ route('posts.show',[$post->id]) }}" class="btn btn-default btn-sm">view</a>
			 	<a href="{{ route('posts.edit',[$post->id]) }}" class="btn btn-default btn-sm">edit</a> </td>
			  </tr>
	          @endforeach
	  	 	
	  	 </tbody>
	  </table>
	  <div class="row">
	  	<div class="col-md-4 offset-md-4">
	  		{!! $posts->links('vendor.pagination.bootstrap-4') !!} 
	  		page {{ $posts->currentPage() }} of {{ $posts->lastpage()}} pages
	  	</div>
	  </div>
	  
		 
	</div>
 </div>	 
@endsection
