@extends ('layout')

@section ('title') .: Alba Boutique | Login :. @stop
@section('meta-description') Login | Tienda Online Alba Boutique @stop
@section ('css') 
	<!-- Icons -->
    <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
    <link rel="shortcut icon" href="{{ URL::to('img/favicon.png') }}">
    <link rel="apple-touch-icon" href="{{ URL::to('img/icon57.png') }}" sizes="57x57">
    <link rel="apple-touch-icon" href="{{ URL::to('img/icon72.png') }}" sizes="72x72">
    <link rel="apple-touch-icon" href="{{ URL::to('img/icon76.png') }}" sizes="76x76">
    <link rel="apple-touch-icon" href="{{ URL::to('img/icon114.png') }}" sizes="114x114">
    <link rel="apple-touch-icon" href="{{ URL::to('img/icon120.png') }}" sizes="120x120">
    <link rel="apple-touch-icon" href="{{ URL::to('img/icon144.png') }}" sizes="144x144">
    <link rel="apple-touch-icon" href="{{ URL::to('img/icon152.png') }}" sizes="152x152">
    <link rel="apple-touch-icon" href="{{ URL::to('img/icon180.png') }}" sizes="180x180">
    <!-- END Icons -->

    <!-- Stylesheets -->
    <!-- Bootstrap is included in its original form, unaltered -->
    <link rel="stylesheet" href="{{url('assets/dashboard/css/bootstrap.min.css')}}">

    <!-- Related styles of various icon packs and plugins -->
    <link rel="stylesheet" href="{{url('assets/dashboard/css/plugins.css')}}">

    <!-- The main stylesheet of this template. All Bootstrap overwrites are defined in here -->
    <link rel="stylesheet" href="{{url('assets/dashboard/css/main.css')}}">

    <!-- Include a specific file here from css/themes/ folder to alter the default theme of the template -->

    <!-- The themes stylesheet of this template (for using specific theme color in individual elements - must included last) -->
    <link rel="stylesheet" href="{{url('assets/dashboard/css/themes/passion.css')}}">
    <!-- END Stylesheets -->
@stop

@section ('body')
    {{-- Login Container --}}
    <div id="login-container">
    	{{--Header--}}
        <h1 class="h2 text-light text-center push-top-bottom animation-slideDown">
        	@yield('title_auth')
        </h1>
        {{-- END Header --}}

        {{-- Block --}}
        <div class="block animation-fadeInQuickInv">
            {{-- Title --}}
            <div class="block-title">
                <div class="block-options pull-right">
                	@yield('buttons_header')
                </div>
                @yield('title_header')
            </div>
            {{-- END Title --}}

            {{-- Form --}}
            @yield('form_auth')
            {{-- END Form --}}
        </div>
        {{-- END Block --}}

        {{-- Footer --}}
        @include('alerts')
        <footer style="color:white;" class="text-center animation-pullUp">
            <small><span id="year-copy"></span> &copy; <a href="http://www.nuestramarca.com/" style="color:white;" target="_blank">Nuestra Marca</a></small>
        </footer>
        {{-- END Footer --}}
    </div>
    {{-- END Login Container --}}
@stop

