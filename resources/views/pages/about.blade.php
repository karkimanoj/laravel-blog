
@extends('main')

    @section('title','| About')
    @section('content')
      <div class="row">
        <div class="col-md-12">
          <h1>About me</h1>
          <p>The club was founded in 1892 and joined the Football League the following year.{{$name}} The club has played at Anfield since its formation. Liverpool established itself as a major force in both English and European football during the{{$email}}  1970s and 1980s when Bill Shankly and Bob Paisley led the club to 11 League titles and seven European trophies. Under the management of Rafa{{$odetails['work']}}  Benítez and captained by Steven Gerrard Liverpool became European champion {{$odetails['mobile']}} for the fifth time, </p>
        </div>  
      </div>
    @endsection

    @section('scripts')
      <script type="text/javascript">
        window.alert('you have entered to about page');
      </script>
    @endsection