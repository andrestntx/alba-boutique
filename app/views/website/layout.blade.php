@extends('layout')
@section('css')  
	{{-- Stylesheets --}}
    {{-- Bootstrap is included in its original form, unaltered --}}
    {{ HTML::style('assets/website/css/bootstrap.min.css') }}

    {{-- Related styles of various icon packs and plugins --}}
    {{ HTML::style('assets/website/css/plugins.css') }}

    {{-- The main stylesheet of this template. All Bootstrap overwrites are defined in here --}}
    {{ HTML::style('assets/website/css/main.css') }}

    {{-- The themes stylesheet of this template (for using specific theme color in individual elements - must included last) --}}
    {{ HTML::style('assets/website/css/themes.css') }}
    {{-- END Stylesheets --}}

    {{-- Modernizr (browser feature detection library) --}}
    {{ HTML::script('assets/website/js/vendor/modernizr-2.8.3.min.js') }}

    @yield('extra-css')
@stop

@section('body')
	{{-- Page Container --}}
    <div id="page-container">
        {{-- Site Header --}}
        <header>
            <div class="container">
                <!-- Site Logo -->
                <a href="{{URL::to('/')}}" class="site-logo">
                    <i class="fa fa-heart"></i> Alba<strong> Boutique</strong>
                </a>
                <!-- END Site Logo -->               

                {{-- Site Navigation --}}
                <nav id="main-meu">
                    <!-- Menu Toggle -->
                    <!-- Toggles menu on small screens -->
                    <a href="javascript:void(0)" class="btn btn-default site-menu-toggle visible-xs visible-sm">
                        Menu
                    </a>
                    <!-- END Menu Toggle -->

                    <!-- Main Menu -->
                    <ul class="site-nav">
                        <li class="active">
                            <a href="{{ URL::to('/') }}" title="Página de Inicio">Inicio</a>
                        </li>
                        <li>
                            <a href="{{ URL::to('contacto') }}" title="Página de Contacto">Contacto</a>
                        </li>
                    </ul>
                    {{-- END Main Menu --}}
                </nav>
                {{-- END Site Navigation --}}
                <div id="contact-tel" style="display:inline-block; height: 42px; line-height: 42px; float:right; margin-right:5px;">
                    <spam style="font-size:16px;"><i class="fa fa-phone"></i>  313 816 7962</spam>
                </div>
            </div>
        </header>
        {{-- END Site Header --}}

        @yield('content')

        <!-- Footer -->
        <footer class="site-footer site-section site-section-light">
            <div class="container">
                <!-- Footer Links -->
                <div class="row">
                    <div class="col-sm-4">
                        <h4 class="footer-heading">Alba Boutique</h4>
                        <ul class="footer-nav ul-breath list-unstyled">
                            <li><a href="javascript:void(0)">Quienes Somos</a></li>
                            <li><a href="javascript:void(0)">Nosotros</a></li>
                            <li><a href="javascript:void(0)">Terminos &amp; Condiciones</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-4">
                        <h4 class="footer-heading">Necesitas Ayuda?</h4>
                        <ul class="footer-nav footer-nav-links list-inline">
                            <li><a href="javascript:void(0)"><i class="fa fa-fw fa-book"></i> Guía de Compras</a></li>
                            <li><a href="javascript:void(0)"><i class="fa fa-fw fa-support"></i> FAQ</a></li>
                        </ul>
                        <h4 class="footer-heading">Nuestras Redes Sociales</h4>
                        <ul class="footer-nav footer-nav-links list-inline">
                            <li><a href="javascript:void(0)" class="social-facebook" data-toggle="tooltip" title="Like our Facebook page"><i class="fa fa-fw fa-facebook"></i></a></li>
                            <li><a href="javascript:void(0)" class="social-twitter" data-toggle="tooltip" title="Follow us on Twitter"><i class="fa fa-fw fa-twitter"></i></a></li>
                            <li><a href="javascript:void(0)" class="social-google-plus" data-toggle="tooltip" title="Like our Google+ page"><i class="fa fa-fw fa-google-plus"></i></a></li>
                            <li><a href="javascript:void(0)" class="social-dribbble" data-toggle="tooltip" title="Follow us on Dribbble"><i class="fa fa-fw fa-dribbble"></i></a></li>
                            <li><a href="javascript:void(0)" class="social-youtube" data-toggle="tooltip" title="Subscribe to our Youtube channel"><i class="fa fa-fw fa-youtube-play"></i></a></li>
                        </ul>
                    </div>
                    <div class="col-sm-4">
                        <h4 class="footer-heading">Recibe nuestras Noticias :)</h4>
                        <form action="index.html" method="post" class="form-inline" onsubmit="return false;">
                            <div class="form-group">
                                <label class="sr-only" for="register-email">Tu Email</label>
                                <div class="input-group">
                                    <input type="email" id="register-email" name="register-email" class="form-control" placeholder="Tu Email..">
                                    <span class="input-group-btn">
                                        <button type="submit" class="btn btn-primary">Enviar</button>
                                    </span>
                                </div>
                            </div>
                        </form>
                        <br>
                        <em><span id="year-copy"></span></em> &copy; Creado con <i class="fa fa-heart text-danger"></i> por <a href="http://www.nuestramarca.com">Nuestra Marca</a>
                    </div>
                </div>
                {{-- END Footer Links --}}
            </div>
        </footer>
        {{-- END Footer --}}
    </div>
    {{-- END Page Container --}}

    {{-- Scroll to top link, initialized in js/app.js - scrollToTop() --}}
    <a href="#" id="to-top"><i class="fa fa-arrow-up"></i></a>
@stop

@section('js')
	{{-- Include Jquery library from Google's CDN but if something goes wrong get Jquery from local file (Remove 'http:' if you have SSL) --}}
    {{ HTML::script('http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js') }}
    <script>!window.jQuery && document.write(decodeURI('%3Cscript src="js/vendor/jquery-2.1.1.min.js"%3E%3C/script%3E'));</script>

    {{-- Bootstrap.js, Jquery plugins and Custom JS code --}}
    {{ HTML::script('assets/website/js/vendor/bootstrap.min.js') }}
    {{ HTML::script('assets/website/js/plugins.js') }}
    {{ HTML::script('assets/website/js/app.js') }}

    @yield('extra-js')
@stop