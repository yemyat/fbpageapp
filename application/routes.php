<?php

Event::listen('404', function()
{
	return Response::error('404');
});

Event::listen('500', function($exception)
{
	return Response::error('500');
});

Route::filter('before', function()
{
	// Do stuff before every request to your application...
});

Route::filter('after', function($response)
{
	// Do stuff after every request to your application...
});

Route::filter('csrf', function()
{
	if (Request::forged()) return Response::error('500');
});

Route::filter('auth', function()
{
  $facebook = IoC::resolve('facebook-sdk');
  if(!$facebook->getUser()) {
    $login_url = $facebook->getLoginUrl(
      array(
        'scope' => 'email, publish_stream, user_photos, friends_photos'
      )
    );
    return '<script type="text/javascript">top.location="'.$login_url.'"</script>';
  }
});

Route::filter('check_owner', function($id)
{
  $facebook = IoC::resolve('facebook-sdk');
  if($facebook->getUser()) {
    $fb_id = $facebook->getUser();
    $user = User::where('fb_id', '=', $fb_id)->first();
    if($user) {
      $post = Post::where('id', '=', $id)->first();
      if($user->id != $post->user_id) {
        return Response::error('500');
      }
    }
  }

});

Route::filter('create_user', function() {
  $facebook = IoC::resolve('facebook-sdk');
  if($fb_id = $facebook->getUser()) {
    if(!User::where('fb_id', '=', $fb_id)->first()) {
      // Query facebook and get info
      $me = $facebook->api('/me');
      $user = new User;
      $user->fb_id = $fb_id;
      $user->fb_name = $me['name'];
      $user->fb_country = 'N/A';
      $user->fb_email = $me['email'];
      $user->fb_country = "";
      /*
      if($me['location']) {
        $user->fb_country = $me['location']['name'];
      }
      */
      $user->ip_address = Request::ip();
      $user->profile_pic_url = "//graph.facebook.com/$fb_id/picture=large";
      $user->access_token = $facebook->getAccessToken();
      $user->save();
    } else {
      // Update IP address & access token
      $user = User::where('fb_id', '=', $fb_id)->first();
      $user->ip_address = Request::ip();
      $user->access_token = $facebook->getAccessToken();
      $user->save();
    }
  }
});

Route::filter('fangate', function() {

  if(isset($_REQUEST['code'])) {
     return '<script type="text/javascript">top.location="'.Config::get('facebook.canvas').'"</script>';
  }

  if (isset($_REQUEST['signed_request'])) {
    $encoded_sig = null;
    $payload = null;
    list($encoded_sig, $payload) = explode('.', $_REQUEST['signed_request'], 2);
    $sig = base64_decode(strtr($encoded_sig, '-_', '+/'));
    $signed_request = json_decode(base64_decode(strtr($payload, '-_', '+/'), true));
    if($signed_request) {
      if(!$signed_request->page->liked) {
        // Redirect to action_fangate
        return Redirect::to('pages/fangate');
      }
    }
  }
});

// Route for Fangate_Controller
Route::controller(Controller::detect());

// Route for Posts_Controller
Route::controller('posts');

// Route for Gallery_Controller
Route::controller('gallery');