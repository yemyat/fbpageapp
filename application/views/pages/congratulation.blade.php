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

		<img src="{{URL::to_asset('img/congrats-tix.png')}}">

		<p>An email with the redemption information will be sent to your email address:</p>
		<span><?= Session::get('email'); ?></span>
		<?php Session::forget('email'); ?>
	</div>
@endsection