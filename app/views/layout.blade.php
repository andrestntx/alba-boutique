<!DOCTYPE html>
<html lang="es">
<!--[if IE 9]>         <html class="no-js lt-ie10"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js"> <!--<![endif]-->
<html>
<head>
	<title>@yield('title', 'Alba Boutique')</title>
	
	{{-- Metas --}}
	<meta charset="utf-8">
	<meta name="description" content="@yield('meta-description', 'Alba Boutique - Tiena Online') }}">
    <meta name="author" content="andrestntx">
    <meta name="robots" content="noindex, nofollow">
	<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1.0">
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