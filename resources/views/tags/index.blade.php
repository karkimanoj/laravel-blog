@extends('main')

@section('title',' all tags')

@section('content')

<div class="row">
	<div class="col-md-8">
		<h1>All tags</h1>
		
			<table class="table">
				<thead>
					<tr>
						<th>#</th>
						<th>Name</th>
					</tr>
				</thead>
				<tbody>
					@foreach($tags as $tag)
					<tr>
						<td>{{ $tag->id}}</td>
						<td>{{ $tag->name }}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
	
	</div>

	<div class="col-md-3 offset-md-1">
		<h4> Create new tag</h4>
		<form method="POST" action="{{ route('tags.store') }}">

			 {{ csrf_field() }}
			 
			<label>Name:</label>
			<input type="text" name="name" class="form-control"><br>

			<input type="submit" name="submit" value="create new tag " class="btn btn-primary btn-block ">

		</form>
	</div>
</div>

@endsection