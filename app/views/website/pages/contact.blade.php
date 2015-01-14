@extends('website.layout')
@section('title') Contacto - Alba Boutique @stop
@section('meta-description') Contacto | Tienda Online Alba Boutique @stop
@section('content')
    {{-- Intro --}}
    <section class="site-section site-section-top site-section-light themed-background-dark">
        <div class="container">
            <h1 class="text-center animation-fadeInQuickInv"><strong>Visítanos cuando quieras :)</strong></h1>
        </div>
    </section>
    {{-- END Intro --}}

    {{-- Google Map --}}
    {{-- Gmaps.js (initialized in js/pages/contact.js), for more examples you can check out http://hpneo.github.io/gmaps/examples.html --}}
    <div id="gmap" class="themed-background-muted" style="height: 300px;"></div>
    {{-- END Google Map --}}

    {{-- Contact --}}
    <section class="site-content site-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3 site-block">
                    @if(isset($message))
                        <div class="alert alert-info alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h4><strong>{{ $message }}</strong></h4>
                        </div>
                    @endif
                    {{ Form::open(['route' => 'contacto.send', 'method' => 'POST', 'id' => 'form-contact']) }}
                        <div class="form-group">
                            {{ Form::label('contact-name', 'Nombre') }}
                            <input type="text" id="contact-name" name="name" class="form-control input-lg" placeholder="Tu nombre">
                        </div>
                        <div class="form-group">
                            {{ Form::label('contact-email', 'Correo Electrónico') }}
                            <input type="email" id="email" name="email" class="form-control input-lg" placeholder="Tu dirección de correo electronico">
                        </div>
                        <div class="form-group">
                            {{ Form::label('contact-tel', 'Teléfono') }}
                            <input type="text" id="contact-tel" name="tel" class="form-control input-lg" placeholder="Tu número de telefono o celular donde te contactemos" required>
                        </div>
                        <div class="form-group">
                            {{ Form::label('contact-message', 'Mensaje') }}
                            <textarea id="contact-message" name="text" rows="7" class="form-control input-lg" placeholder="¿Cómo podemos ayudarte?"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-lg btn-primary">Enviar Mensaje</button>
                        </div>
                    {{Form::close()}}
                </div>
            </div>
        </div>
    </section>
    {{-- END Contact --}}
@stop
@section('extra-js')
      
    {{-- Google Maps API + Gmaps Plugin, must be loaded in the page you would like to use maps (Remove 'http:' if you have SSL) --}}
    {{ HTML::script('http://maps.google.com/maps/api/js?sensor=true') }}
    {{ HTML::script('assets/website/js/plugins/gmaps.min.js') }}

    {{-- Load and execute javascript code used only in this page --}}
    {{ HTML::script('assets/website/js/pages/contact.js') }}
    <script>$(function (){ Contact.init(); });</script>
@stop
