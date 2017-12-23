
@extends('main')

@section('title','|view post')

@section('stylesheets')
<link rel="stylesheet" type="text/css" href="/css/styles.css">
@endsection

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

<div class="row">
    <div class="col-md-8 ">
      <div class="comment-title top-spacing-30">
        <h3><img src="/open-iconic/svg/comment-square.svg" width="24px" height="24px"> {{ $post->comments()->count() }} comments</h3>
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

                 <div class="form-group">
                     <a href="{{ route('comments.edit', $comment->id) }}" >
                        <img src="/open-iconic/svg/pencil.svg"  width="20px" height="20px" class="ml-3">
                      </a>
                      <a href="{{ route('comments.confirmDelete', $comment->id) }}">
                        <img src="/open-iconic/svg/delete.svg"  width="20px" height="20px" class="ml-3">
                      </a>
                 </div>
            </div>

        </div>
      @endforeach
      </div>
    </div>

@endsection