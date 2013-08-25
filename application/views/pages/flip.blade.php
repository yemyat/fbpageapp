@layout('layouts/app')

@section('content')
	<div id="header">
      <div id="buttons">
        <a href="{{URL::to('gallery')}}">Vote <img src="{{URL::to_asset('img/caret.png')}}" alt=""></a>
        <a href="{{URL::to('posts/participate')}}">Participate <img src="{{URL::to_asset('img/caret.png')}}" alt=""></a>
      </div>
	</div>

	<div id="thank-you">
		<h3>Thank you for voting</h3>
		<p>Flip the ticket and see if you have won a <b>FREE CLASS VOUCHER</b></p>

		<a href="<?php echo Session::get('url'); ?>">
			<img src="{{URL::to_asset('img/flip-tix.png')}}" id="flip">
		</a>
	</div>
@endsection