@extends('layout')
@section('css')  
	{{-- Stylesheets --}}
    {{-- Bootstrap is included in its original form, unaltered --}}
    {{ HTML::style('assets/website/css/website.min.css') }}

    @yield('extra-css')
@stop

@section('body')
	{{-- Page Container --}}
    <div id="page-container" itemprop="mainContentOfPage">
        {{-- Site Header --}}
        <header itemscope itemtype="http://schema.org/WPHeader">
            <div class="container">
                <!-- Site Logo -->
                <a href="{{URL::to('/')}}" class="site-logo" itemprop="relatedLink">
                    <img src="{{URL::to('img/alba_boutique_logo.png')}}" style="width:195px; margin-top:-4px;" class="hidden-xs">
                    <img src="{{URL::to('img/alba_boutique_logo_2.png')}}" style="width:110px;" class="visible-xs">
                </a>
                <!-- END Site Logo -->               

                {{-- Site Navigation --}}
                <nav>
                    <!-- Menu Toggle -->
                    <!-- Toggles menu on small screens -->
                    <a href="javascript:void(0)" class="btn btn-default site-menu-toggle visible-xs visible-sm">
                        Menu
                    </a>
                    <!-- END Menu Toggle -->

                    <!-- Main Menu -->
                    <ul class="site-nav">
                        <li class="active">
                            <a href="{{ URL::to('/') }}" title="Página de Inicio" itemprop="relatedLink" itemprop="significantLink">Inicio</a>
                        </li>
                        <li>
                            <a href="{{ URL::to('catalogo') }}" title="Catálogo de Productos" itemprop="relatedLink" itemprop="significantLink"><i class="gi gi-coat_hanger"></i> Catalogo</a>
                        </li>
                        <li>
                            <a href="{{ URL::to('ventas-al-por-mayor') }}" title="Ventas al Por Mayor" itemprop="relatedLink" itemprop="significantLink"><i class="fa fa-truck"></i> Por Mayor</a>
                        </li>
                        <li>
                            <a href="{{ URL::to('regalos') }}" title="Regalos para tu Pareja" itemprop="relatedLink" itemprop="significantLink"><i class="hi hi-heart"></i> Regalos</a>
                        </li>
                        <li>
                            <a href="{{ URL::to('contacto') }}" title="Página de Contacto" itemprop="relatedLink" itemprop="significantLink"><i class="gi gi-envelope"></i> Contacto</a>
                        </li>
                        <li>
                            <a href=""><spam style="font-size:16px;" itemprop="relatedLink"><i class="fa fa-phone"></i>  313 816 7962</spam></a>
                        </li>
                    </ul>
                    {{-- END Main Menu --}}
                </nav>
                {{-- END Site Navigation --}}                    
            </div>
        </header>
        {{-- END Site Header --}}

        @yield('content')

        <!-- Footer -->
        <footer class="site-footer site-section site-section-light" itemscope itemtype="http://schema.org/WPFooter">
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
                            <li><a href="https://www.facebook.com/ModaFemeninaCo" class="social-facebook" data-toggle="tooltip" title="Siguenos en Facebook"><i class="fa fa-fw fa-facebook"></i></a></li>
                            <li><a href="https://twitter.com/albaboutique" class="social-twitter" data-toggle="tooltip" title="Follow us on Twitter"><i class="fa fa-fw fa-twitter"></i></a></li>
                            <li><a href="https://plus.google.com/+AlbaBoutiquevillavicencio" rel="publisher" class="social-google-plus" data-toggle="tooltip" title="Siguenos en Google Plus"><i class="fa fa-fw fa-google-plus"></i> Google+</a></li>
                            <li><a href="http://es.pinterest.com/nuestramarca/alba-boutique-tienda-online/" class="social-pinterest" data-toggle="tooltip" title="Siguenos en Pinterest"><i class="fa fa-fw fa-pinterest"></i></a></li>
                            <li><a href="http://instagram.com/albaboutiques" class="social-instagram" data-toggle="tooltip" title="Siguenos en Instagram"><i class="fa fa-fw fa-instagram"></i></a></li>
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
    {{-- Modernizr (browser feature detection library) --}}
    {{ HTML::script('assets/website/js/vendor/modernizr-2.8.3.min.js') }}
    
    {{-- Facebook Ads --}}
    {{ HTML::script('assets/website/js/seo/facebook_pixel_web.js') }}
    <noscript>
        <img height="1" width="1" alt="" 
            style="display:none" src="https://www.facebook.com/tr?id=1582175242027297&amp;ev=PixelInitialized" />
    </noscript>

	{{-- Include Jquery library from Google's CDN but if something goes wrong get Jquery from local file (Remove 'http:' if you have SSL) --}}
    {{ HTML::script('http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js') }}
    <script>!window.jQuery && document.write(decodeURI('%3Cscript src="js/vendor/jquery-2.1.1.min.js"%3E%3C/script%3E'));</script>

    {{-- Bootstrap.js, Jquery plugins and Custom JS code --}}
    {{ HTML::script('assets/website/js/vendor/bootstrap.min.js') }}
    {{ HTML::script('assets/website/js/plugins.min.js') }}
    {{ HTML::script('assets/website/js/app.min.js') }}
    {{ HTML::script('assets/website/js/seo/google_analytics.js') }}

    <script type="text/javascript" async defer
        src="https://apis.google.com/js/platform.js?publisherid=106563667879480455749">
    </script>

    <script type="text/javascript">
        /* <![CDATA[ */
        var google_conversion_id = 960142514;
        var google_custom_params = window.google_tag_params;
        var google_remarketing_only = true;
        /* ]]> */
    </script>
    <script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js"></script>
    <noscript>
        <div style="display:inline;">
            <img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/960142514/?value=0&amp;guid=ON&amp;script=0"/>
        </div>
    </noscript>


    @yield('extra-js')
@stop