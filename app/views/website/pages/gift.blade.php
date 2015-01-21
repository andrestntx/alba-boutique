@extends('website.layout')
@section('title') Regalos para tu Pareja - Alba Boutique @stop
@section('meta-description') ¿No sabes qué regalarle a tu Pareja? - Nostras te asesoramos @stop
@section('content')
    <div class="media-promo">
        <section class="media-promo-section">
            <div class="container">
                <h1 ><strong>¿No sabes qué regalarle a tu Pareja?</strong></h1>
                <h2 ><strong>Tranquilo!, nosotras te asesoramos <i class="fa fa-smile-o"></i></strong></h2>
            </div>
        </section>
        <img class="media-promo-image hidden-xs" alt="Un buen regalo para una mujer" src="{{URL::to('img/placeholders/photos/regalo_para_mi_pareja.jpg')}}">
        <img class="media-promo-image visible-xs" alt="Un buen regalo para una mujer" src="{{URL::to('img/placeholders/photos/regalo_para_mi_pareja_400.jpg')}}">
    </div>
    <section class="site-section site-content border-bottom overflow-hidden">
        <div class="container">
            <div class="row">
            <div class="col-sm-6 push">
                <h2 class="site-heading"><strong>Deja todo en nuestras manos</strong></h2>
                <p class="feature-text push">
                    Las mujeres somos felices comprando, pero nos hace mucho más felices cuando nuestra pareja tiene el detalle de comprarnos lo que nos gusta. ¿Pero cómo saber qué nos gusta?</p>
                <h2 class="site-heading"><strong>Nosotras te Ayudamos!</strong></h2>
                <p class="feature-text push">
                    Haremos que tu Pareja sepa el galan que eres y que la quieres mucho. Llámanos o escribenos por WhatsApp <strong>313 816 7962</strong> y te ayudaremos desde escoger el mejor regalo, a que le des una gran sorpresa.
                </p>
                <h2 class="site-heading"><strong><i class="fa fa-phone"></i> 313 816 7962</strong></h2>
            </div>
            <div class="col-sm-6 clearfix push">
                <img style="max-width: 350px; margin-right: -30px;" data-element-offset="-200" data-animation-class="animation-fadeInLeft" data-toggle="animation-appear" class="img-responsive pull-right animation-fadeInLeft" alt="" src="{{URL::to('img/placeholders/photos/regalo_para_mi_pareja_2.jpg')}}">
            </div>
            </div>
        </div>
    </section>
@stop
@section('extra-js')

@stop
