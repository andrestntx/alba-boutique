@extends('website.layout')
@section('title') Venta de Pijamas al por Mayor - Alba Boutique @stop
@section('meta-description') Compra nuestras Pijamas al Mayor para tu Negocio - Excelentes Descuentos por compras al por mayor. Envios a todo Colombia @stop
@section('extra-css')
    {{-- Css Catalog --}}
    <style type="text/css">
        #catalog .thumbnail {
            border-width: 1px;
        }

        #catalog .thumbnail{
            transition: transform 0.5s ease-out 0s;
        }

        #catalog .thumbnail:hover {
            border-color: #337ab7;
            transform: scale(1.1); 
            -ms-transform: scale(1.1); 
            -webkit-transform: scale(1.1); 
            -o-transform: scale(1.1); 
            -moz-transform: scale(1.1);
        }

    </style>
@stop
@section('content')
    <!-- Intro -->
    <section class="site-section site-section-top site-section-light themed-background-dark" style="padding: 90px 0 20px 0;">
        <div class="container text-center">
            <h1 class="animation-fadeInQuickInv"><strong>Venta de Pijamas al por Mayor</strong></h1>
        </div>
    </section>
    <!-- END Intro -->
    <section class="site-section site-content border-bottom overflow-hidden">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 clearfix push">
                    <div id="project-carousel" class="carousel slide" data-ride="carousel" data-interval="4000">
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner text-center">
                            <?php $count=1; ?>
                            @foreach($category->products as $pijama)
                                <div class="@if($count == 1) active @endif item">
                                    <img src="{{URL::to($pijama->image)}}" alt="{{$pijama->name}}">
                                </div>
                                <?php $count++; ?>
                            @endforeach
                        </div>
                        <!-- END Wrapper for slides -->

                        <!-- Controls -->
                        <a class="left carousel-control" href="#project-carousel" data-slide="prev">
                            <span>
                                <i class="fa fa-chevron-left"></i>
                            </span>
                        </a>
                        <a class="right carousel-control" href="#project-carousel" data-slide="next">
                            <span>
                                <i class="fa fa-chevron-right"></i>
                            </span>
                        </a>
                        <!-- END Controls -->
                    </div>
                </div>
                <div class="col-sm-6">
                    <h2 class="site-heading" style="font-size:2em;"><i class="fa fa-truck"></i> Compra nuestras Pijamas al por Mayor</h2>
                    <p class="feature-text" style="margin-bottom:15px;">
                        Si tienes un negocio de productos para Mujer o si te gusta venderles de todo a tus amigas, esta oferta es para ti :). En Alba Boutique te damos excelentes precios y descuentos para tu Negocio.
                    </p>
                    <p class="feature-text">
                        Realizando una compra mínima de $400.000 ya te damos precio al por mayor. Puedes comprar en las Tallas y colores que desees. Hacemos envíos a todo Colombia.
                    </p>
                    <p style="font-size:1.8em; margin:15px 0;"><i class="fa fa-phone"></i> Déjanos tus datos y nosotros te llamamos</p>
                    {{ Form::open(['route' => 'venta-de-pijamas-al-por-mayor.post', 'method' => 'POST', 'id' => 'form-contact', 'class' => 'form-inline']) }}
                        <div class="form-group">
                            <label for="name" class="sr-only">Nombre</label>
                            {{Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Tu Nombre', 'required'])}}
                        </div>
                        <div class="form-group">
                            <label for="tel" class="sr-only">Nombre</label>
                            {{Form::text('tel', null, ['class' => 'form-control', 'placeholder' => 'Número de Teléfono', 'required'])}}
                        </div>
                        {{Form::hidden('text', 'Contacto de Pijamas al por mayor')}}
                        {{Form::hidden('email', 'sinemail@gmil.com')}}
                        <div class="form-group">
                            <button type="submit" class="btn btn-info">Si, Quiero Información!</button>
                        </div>
                    {{Form::close()}}
                    <ul class="footer-nav footer-nav-links list-inline text-center" style="margin-top:16px;">
                        <li><a href="https://www.facebook.com/ModaFemeninaCo" class="social-facebook" data-toggle="tooltip" title="Siguenos en Facebook"><i class="fa fa-fw fa-facebook"></i></a></li>
                        <li><a href="https://twitter.com/albaboutique" class="social-twitter" data-toggle="tooltip" title="Follow us on Twitter"><i class="fa fa-fw fa-twitter"></i></a></li>
                        <li><a href="https://plus.google.com/+AlbaBoutiquevillavicencio" rel="publisher" class="social-google-plus" data-toggle="tooltip" title="Siguenos en Google Plus"><i class="fa fa-fw fa-google-plus"></i> </a></li>
                        <li><a href="http://es.pinterest.com/nuestramarca/alba-boutique-tienda-online/" class="social-pinterest" data-toggle="tooltip" title="Siguenos en Pinterest"><i class="fa fa-fw fa-pinterest"></i></a></li>
                        <li><a href="http://instagram.com/albaboutiques" class="social-instagram" data-toggle="tooltip" title="Siguenos en Instagram"><i class="fa fa-fw fa-instagram"></i></a></li>
                    </ul>
                    @if(isset($message))
                        <div class="alert alert-info alert-dismissable" style="margin-top:15px;">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <p><strong>{{ $message }}</strong></p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <section class="site-section site-section-light themed-background-dark" style="padding: 10px 0;">
        <div class="container text-center">
            <p class="animation-fadeInQuickInv h2">Llámanos o escríbenos por WhatsApp <i class="fa fa-phone"></i> 313 816 7962</p>
        </div>
    </section>
    <!-- Portfolio -->
    <section class="site-content site-section" style="background-color: #ebeff2; padding-top:10px;">
        <div class="container" id="catalog">
            <h3>Conoce nuestro Catálogo de Pijamas al Por Mayor</h3>
            <div class="row row-items">
                @foreach($category->products as $product)
                    <article class="col-md-4 col-sm-6 col-xs-12 thumb">
                        <div class="widget" itemscope itemtype="http://schema.org/Product">
                            <div class="widget-content widget-content-mini themed-background-muted">
                                <i class="fa fa-heart"></i> <span itemprop="name">{{ $product->short_name }} </span>
                            </div>
                            <div class="widget-content text-center">
                                <a href="{{ route('catalogo.producto', array($category->name_url, $product->name_url)) }}">
                                    <div class="thumbnail" style="height:230px; overflow:hidden; margin-bottom:0px;" itemprop="image">
                                        <img class="img-responsive" src="{{URL::to($product->small_image)}}" alt="Producto: {{$product->name}} | Alba Boutique" title="Producto: {{$product->name}} | Alba Boutique"/>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>
@stop
@section('extra-js')

@stop
