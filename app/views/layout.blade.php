<!DOCTYPE html>
<html lang="es" itemscope itemtype="http://schema.org/WebPage">
<!--[if IE 9]>         <html class="no-js lt-ie10"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js"> <!--<![endif]-->
<html>
<head>
	<title>@yield('title', 'Alba Boutique: Tienda Online')</title>
	
	{{-- Metas --}}
	<meta charset="utf-8">
	<meta name="description" content="@yield('meta-description', 'Tienda Online para Mujeres | Alba Boutique')">
    <meta name="keywords" content="Pijamas para Mujer, Pantys, Tangas, Pijamas al por mayor, Tienda Online Mujer">
    <meta name="author" content="andrestntx">
    <meta name="robots" content="index, follow">
	<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1.0">
    <link rel=”alternate” hreflang="co" href="http://alba.boutique" />
	{{--End Metas--}}

  {{-- Facebook Ads --}}

  <script>
    (function() {
      var _fbq = window._fbq || (window._fbq = []);
      if (!_fbq.loaded) 
      {
        var fbds = document.createElement('script');
        fbds.async = true;
        fbds.src = '//connect.facebook.net/en_US/fbds.js';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(fbds, s);
        _fbq.loaded = true;
      }
      _fbq.push(['addPixelId', '1582175242027297']);
    })();
    window._fbq = window._fbq || [];
    window._fbq.push(['track', 'PixelInitialized', {}]);
  </script>

  <noscript>
    <img height="1" width="1" alt="" style="display:none" src="https://www.facebook.com/tr?id=1582175242027297&amp;ev=PixelInitialized" />
  </noscript>

  {{-- End Facebook Ads --}}

	{{-- Icons --}}
    <link rel="shortcut icon" href="{{ URL::to('img/favicon.png') }}">
    <link rel="apple-touch-icon" href="{{ URL::to('img/icon57.png') }}" sizes="57x57">
    <link rel="apple-touch-icon" href="{{ URL::to('img/icon72.png') }}" sizes="72x72">
    <link rel="apple-touch-icon" href="{{ URL::to('img/icon76.png') }}" sizes="76x76">
    <link rel="apple-touch-icon" href="{{ URL::to('img/icon114.png') }}" sizes="114x114">
    <link rel="apple-touch-icon" href="{{ URL::to('img/icon120.png') }}" sizes="120x120">
    <link rel="apple-touch-icon" href="{{ URL::to('img/icon144.png') }}" sizes="144x144">
    <link rel="apple-touch-icon" href="{{ URL::to('img/icon152.png') }}" sizes="152x152">
    <link rel="apple-touch-icon" href="{{ URL::to('img/icon180.png') }}" sizes="180x180">
    {{-- END Icons --}}
	@yield('css')

</head>
<body>
	@yield('body')
	@yield('js')

    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-58575928-1', 'auto');
      ga('send', 'pageview');

    </script>
</body>
</html>