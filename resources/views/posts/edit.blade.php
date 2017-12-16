
@extends('main')

@section('title','|edit post')

@section('content')

<div class="row">
  <div class="col-md-4 offset-md-4">
     <h2>Edit post</h2>  
  </div> 

</div>

 <div class="row">
 <form method="POST" action="{{route('posts.update',[$post->id])}}" style="width: 100%">
  <div class="col-md-8">
   
        <div class="form-group">
        <label>Title:</label> <br>
        <input type="text" name="title" class="form-control input-lg" id="titlediv" value="{{ $post->title }}">
        <div style="color: red"></div>
        </div>

        <div class="form-group">
        <label>Slug:</label>  <br>
        <input type="text" name="slug" class="form-control" id="slugdiv" required minlength="5" maxlength="255" value="{{$post->slug}}">
        <div style="color: red"></div>
        </div>

        <div class="form-group">
          <label>category:</label>
          <select class="form-control" required name='category_id'>
            @foreach($categories as $category)
              <option value="{{ $category->id }}" {{ $category->id==$post->category['id']?'selected':'' }}>
                  {{$category->name}}
               </option>
            @endforeach
          </select>
        </div>

        <div class="form-group">
        <label>Post body:</label> <br>
        <textarea class="form-control"  rows="6" name="body" id="bodydiv" > {{ $post->body }} </textarea>
        <div style="color: red"></div>
        </div>

          {{csrf_field()}}
          {{ method_field('PUT') }}
      
 
  </div>

  <div class="col-md-4">
  	<div class="well">
  		<dl class="dl-horizontal">
  			<dt>created at:</dt>
  			<dd>{{ date('M j, Y h:ia', strtotime($post->created_at)) }}</dd>
  			<dt>updated at:</dt>
  			<dd>{{ date('M j, Y h:ia', strtotime($post->updated_at)) }}</dd>
  		</dl>

  		<div class="row">
  			<div class="col-sm-6">
  				 <input type="submit" name="submit" value="save" class="btn btn-success btn-block">
  			</div>
  			<div class="col-sm-6">
  				<a href="{{ route('posts.show',['id'=>$post->id]) }}" class="btn btn-danger btn-block"> Cancel </a>
  			</div>
  		</div>

  	</div>
  </div>	 
  <form>	
</div>

@endsection

@section('scripts')
  <script type="text/javascript" src='/js/create.js'></script>
@endsection