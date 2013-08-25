<?php

class Base_Controller extends Controller {

	public function __construct() {
	  parent::__construct();
	  $this->filter('before', 'fangate')->except(array('fangate'));
	  $this->filter('before', 'auth');
	  $this->filter('before', 'create_user')->only(array('index'));

	  Asset::add('jquery', 'js/lib/jquery.min.js');
	  Asset::add('spin', 'js/lib/spin.min.js');
	  Asset::add('underscore', 'js/lib/underscore.min.js');
	  Asset::add('jquery-transit', 'js/lib/jquery.transit.js');
	  Asset::add('colorbox', 'js/lib/jquery.colorbox-min.js');
	  Asset::add('app', 'js/app.js');
	}

	public function __call($method, $parameters)
	{
		return Response::error('404');
	}

	public function getCurrentUser() {
		$facebook = IoC::resolve('facebook-sdk');
		$fb_id = $facebook->getUser();
		$user = User::where('fb_id', '=', $fb_id)->first();
		if($user) {
			return $user;
		}
		return null;
	}

}