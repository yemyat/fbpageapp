jQuery ($) ->
  if (!$.support.transition)
    $.fn.transition = $.fn.animate

  window.fbAsyncInit = ->
    # init the FB JS SDK
    FB.init
      appId: $('meta[property=fb_id]').attr("content") # App ID from the app dashboard
      status: true # Check Facebook Login status
      xfbml: true # Look for social plugins on the page
    FB.Canvas.setAutoGrow 91

  # Load the SDK asynchronously
  ((d, s, id) ->
    js = undefined
    fjs = d.getElementsByTagName(s)[0]
    return  if d.getElementById(id)
    js = d.createElement(s)
    js.id = id
    js.src = "//connect.facebook.net/en_US/all.js"
    fjs.parentNode.insertBefore js, fjs
  ) document, "script", "facebook-jssdk"