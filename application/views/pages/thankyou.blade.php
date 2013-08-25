@layout('layouts/app')
@section('content')
  <div class="jumbotron">
    <img src="{{URL::to_asset('img/manhunt.jpg')}}" alt="">
  </div>

  <div class="row">
    <div class="col-lg-12 action-buttons">
      <h1>Thank You for Voting!</h1>
      <a href="{{URL::to('gallery/index')}}" class="btn btn-success">Back to Gallery</a>
    </div>
  </div>
@endsection