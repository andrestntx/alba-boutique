<!DOCTYPE html>
<html lang="es" itemscope itemtype="http://schema.org/WebPage">
<!--[if IE 9]>         <html class="no-js lt-ie10"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js"> <!--<![endif]-->
<html>
<head>
	<title>@yield('title', 'Alba Boutique | Hermosa Ropa Femenina de la mejor Calidad')</title>
	
	{{-- Metas --}}
	<meta charset="utf-8">
	<meta name="description" content="@yield('meta-description', 'Alba Boutique: Venta al Por Mayor y al Detal de hormosa ropa mujer. Compra en nuestra tienda Online, hacemos envíos a todo Colombia')">
  <meta name="keywords" content="Pijamas para Mujer, Pantys, Tangas, Pijamas al por mayor, Tienda Online Mujer, Ropa interior femenina, Ropa intima">
  <meta name="author" content="Alba Boutique">
  <meta name="robots" content="index, follow">
	<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1.0">
  <link rel="alternate" hreflang="co" href="http://alba.boutique" />
	{{--End Metas--}}

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
</body>
</html>