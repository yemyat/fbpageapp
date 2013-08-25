@layout('layouts/app')
@section('content')
  <div class="jumbotron">
    <img src="{{URL::to_asset('img/manhunt.jpg')}}" alt="">

    <p>PREDICT which Manhunt Contestant will be “Mr ORIS” and stand a chance to win ORIS premium timepieces worth more than $2,200!</p>

    <div class="row">
      <img src="{{URL::to_asset('img/prize1.jpg')}}" alt="">
    </div>
    <p><a href="{{URL::to('posts/participate')}}" class="btn btn-large btn-success" href="#">Participate</a></p>
    <div class="row">
      <p class="small">Contest ends 31st August 2013, 1430hrs. One lucky winner with the correct “Mr ORIS” prediction will be picked to win one of the ORIS premium timepieces.</p>
    </div>
  </div>
@endsection