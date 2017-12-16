<!-- default navbar from bootstrap-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light" style="margin-bottom: 20px">
      <a class="navbar-brand" href="#">laravel blog</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item {{ Request::is('/')?'active':'' }}">
            <a class="nav-link" href="/">Home </a>
          </li>
          <li class="nav-item {{ Request::is('blog')?'active':'' }}">
            <a class="nav-link" href="/blog">blog </a>
          </li>
          <li class="nav-item {{ Request::is('about')?'active':'' }}">
            <a class="nav-link" href="/about">About</a>
          </li>
          <li class="nav-item {{ Request::is('contact')?'active':'' }}">
            <a class="nav-link" href="/contact">Contact</a>
          </li>
        </ul>

        <ul class="nav navbar-nav navbar-right" style="margin-left: 60%;">
          @if( Auth::check())
          <li class="nav-item dropdown ">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
             Hello {{ Auth::user()->name }}
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="{{ route('categories.index') }}">categories</a>
              <a class="dropdown-item" href="{{ route('posts.index') }}">posts</a>
              <a class="dropdown-item" href="{{route('logout')}}">logout</a>
            </div>
          </li>
          @else
           <a href="{{ route('login') }}" class="btn btn-default"> login</a>   <a href="{{ route('register') }}" class="btn btn-default"> register</a>
           @endif

        </ul>
      </div>
    </nav>