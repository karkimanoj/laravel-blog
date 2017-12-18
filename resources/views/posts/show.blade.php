
@extends('main')

@section('title','|view post')

@section('content')

<div class="row">

  <div class="col-md-8">
  	<h1>{{ $post->title }}</h1>
    <p class="lead">{{ $post->body }}</p>
    <hr>
    <div class="tags">
      @foreach($post->tags as $tag)
        <span class="badge badge-info"> {{ $tag->name }} </span>
      @endforeach
    </div>
  </div>

  <div class="col-md-4">
  	<div class="well">
  		<dl class="dl-horizontal">
  			<dt>slug:</dt>
  			<dd> <a href="{{ route('blog.single',$post->slug) }}"> 
             {{ route('blog.single',$post->slug) }}</a> </dd>
         <dt> category: </dt>
         <dd>{{ $post->category['name'] }}</dd>    
  			<dt>created at:</dt>
  			<dd>{{ date('M j, Y h:ia', strtotime($post->created_at)) }}</dd>
  			<dt>updated at:</dt>
  			<dd>{{ date('M j, Y h:ia', strtotime($post->updated_at)) }}</dd>
  		</dl>

  		<div class="row">
  			<div class="col-sm-6">
  				<a href="{{ route('posts.edit',['id'=>$post->id]) }}" class="btn btn-primary btn-block"> Edit </a>
  			</div>

  			<div class="col-sm-6">
  			 <form method="POST" action="{{ route('posts.destroy', [$post->id]) }}">
			    <input type="submit" value="Delete" class="btn btn-danger btn-block">
			    <input type="hidden" name="_token" value="{{ Session::token() }}">
			   {{ method_field('DELETE') }}
			   </form>﻿
        </div>
  		</div>

  		<div class="row">
  			<div class="col-sm-12">
  				<a href="{{ route('posts.index') }}" class="btn btn-default btn-block btn-h1-spacing" > << show all post</a>
  			</div>
  		</div>

  	</div>
  </div>	 	
</div>

@endsection