<!DOCTYPE html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8|!(IE)]><!--><html class="no-js"><!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>FBPageApp</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width">
  <meta property="og:title" content="ciNE65">
  <meta property="og:image" content="">
  <meta property="og:description" content="">
  <meta property="fb_id" content="{{Config::get('facebook.app_id')}}">
  <meta property="fb_canvas" content="{{Config::get('facebook.canvas')}}">
  <meta name="viewport" content="width=device-width">
  <script type="text/javascript" src="//use.typekit.net/whs4wom.js"></script>
  <script type="text/javascript">try{Typekit.load();}catch(e){}</script>
  {{ HTML::style('css/bootstrap.css') }}
  {{ HTML::style('css/colorbox.css') }}
  {{ HTML::style('css/style.css') }}
</head>
<body>
  <div id="fb-root"></div>

  <div id="content-wrapper" class="container-narrow">
    @yield('content')
  </div>

  <?php echo Asset::scripts(); ?>
</body>
</html>
