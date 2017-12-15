<!doctype html>
<html lang="en">
  <head>
    @include('partials/_head') <!--patials._head also works-->
    @yield('stylesheets')
  </head>

  <body>
   
  @include('partials/_navbar')

    <div class="container">

      <!--<p> {{ Auth::check()?'logedin':'logedout' }}  </p>-->
      
     @include('partials._messages')
     @yield('content')

     @include('partials._footer')
    </div> <!-- end of container-->

    @include('partials._javascripts')
    @yield('scripts')

  </body>
</html>