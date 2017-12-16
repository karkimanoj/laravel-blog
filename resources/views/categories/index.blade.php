@extends('main')

@section('title',' all categories')

@section('content')

<div class="row">
	<div class="col-md-8">
		<h1>All categories</h1>
		
			<table class="table">
				<thead>
					<tr>
						<th>#</th>
						<th>Name</th>
					</tr>
				</thead>
				<tbody>
					@foreach($categories as $category)
					<tr>
						<td>{{ $category->id }}</td>
						<td>{{ $category->name }}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
	
	</div>

	<div class="col-md-3 offset-md-1">
		<h4> Create new category</h4>
		<form method="POST" action="{{ route('categories.store') }}">

			 {{ csrf_field() }}
			 
			<label>Name:</label>
			<input type="text" name="name" class="form-control"><br>

			<input type="submit" name="submit" value="create new category" class="btn btn-primary btn-block ">

		</form>
	</div>
</div>

@endsection