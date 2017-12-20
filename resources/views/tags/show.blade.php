@extends('main')

@section('title', "| $tag->name tag")

@section('content')

<div class="row">
	
	<div class="col-md-8">
		<h1>{{ $tag->name }}<small class="xs"> {{ $tag->posts->count() }} posts </small></h1>
	</div>
</div>

<div class="row">	
	<div class="col-md-12">
		
		<table class="table">
			<thead>
				<tr>
					<th>#</th>
					<th>posts</th>
					<th>tags </th>
					<th></th>
				</tr>
			</thead>
			<tbody>
			  @foreach($tag->posts as $post)  	
				<tr>
					<th>{{ $post->id }}</th>
					<td>{{ $post->title }}</td>
					<td>
						@foreach($post->tags as $tag)
							<span class="badge badge-info">{{ $tag->name }}</span>
						@endforeach
					</td>
					<td> <a href="{{ route('posts.show', [$post->id] ) }}" class="btn btn-default btn-xs">view</a></td>
				</tr>
			  @endforeach
			</tbody>
		</table>
    </div>
</div>

@endsection