
  @extends('main')   

    @section('title','| welcome')

     @section('content')
      <div class="row">
        <div class="col-md-12">
          <div class="jumbotron">
            <h1 class="display-3">Hello, world! welcome </h1>
            <p class="lead">Thanks for visiting. This is my laravel blog. You can read latest post here</p>
            <hr class="my-4">
            
            <p class="lead">
              <a class="btn btn-primary btn-lg" href="#" role="button">popular posts</a>
            </p>
          </div>
        </div>
      </div> <!-- end of header row -->

      <div class="row">
        <div class="col-md-8" >

        @foreach($posts as $post)
          <div class="post">
            <h3>{{ $post->title }}</h3>
            <p> {{ substr(strip_tags($post->body),0,300) }}  <span style="color: blue"> {{ strlen(strip_tags($post->body))>300?'....':'' }} </span> </p>
            <a href="{{ route('blog.single', $post->slug) }}" class="btn btn-primary"> read more</a>
          </div>
          <hr>
        @endforeach
          
        </div>
        <div class="col-md-3 col-md-offset-2" >
          <h2>sidebar</h2>
        </div>
      </div>
    @endsection
    