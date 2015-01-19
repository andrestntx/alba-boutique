@extends('website.layout')
@section('title') Ventas al por Mayor - Alba Boutique @stop
@section('meta-description') Compra nuestros Productos al por Mayor - Alba Boutique @stop
@section('content')
    <div class="media-promo">
        <section class="media-promo-section">
            <div class="container">
                <h1 ><strong><i class="fa fa-truck"></i> Compra al por mayor</strong></h1>
                <h2 ><strong>Excelentes precios para tu negocio </strong></h2>
            </div>
        </section>
        <img class="media-promo-image" alt="" src="{{URL::to('img/placeholders/photos/ventas_al_por_mayor.jpg')}}">
    </div>
    <section class="site-section site-content border-bottom overflow-hidden">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 clearfix push">
                    <img style="max-width: 600px; margin-left: -150px;" data-element-offset="200" data-animation-class="animation-fadeInRight" data-toggle="animation-appear" class="img-responsive pull-left animation-fadeInRight" alt="" src="{{URL::to('img/placeholders/photos/ventas_al_por_mayor_2.jpg')}}">
                </div>
                <div class="col-sm-6 push">
                    <h2 class="site-heading"><strong>Un gran producto para tu negocio</strong></h2>
                    <p class="feature-text" style="margin-bottom:20px;">
                        Nuestras prendas se venden muy fácil. Su calidad, estilo diferente y buen precio hace que los cliente compren con confianza. En <strong>Alba Boutique</strong> manejamos Pijamas para mujer, Ropa interior femenina, Ropa interior masculina y Ropa Deportiva.
                    </p>
                    <h2 class="site-heading"><strong>Envios a todo Colombia</strong></h2>
                    <p class="feature-text push">
                        Nos encontramos en Villavicencio, pero hacemos envios a todo Colombia. Tan solo debes hacer una <strong>compra minima por $400.000</strong>; entre más compres, mejor precio te daremos.
                    </p>
                    <h2 class="site-heading"><strong>Llámanos ahora <i class="fa fa-phone"></i> 313 816 7962</strong></h2>
                </div>
            </div>
        </div>
    </section>
@stop
@section('extra-js')

@stop
