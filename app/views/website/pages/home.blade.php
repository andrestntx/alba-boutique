@extends('website.layout')
@section('extra-css')
    {{-- Css Catalog --}}
    <style type="text/css">
        #catalog .thumbnail {
            border-width: 1px;
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
	<!-- Intro + Action -->
    <div class="media-promo">
        <section class="media-promo-section">
            <div class="container">
                <h1 style="float:left;">
                    <strong>
                        <i class="fa fa-heart hidden-xs"></i>
                        <span class="hidden-xs">Belleza y Estilo</span>
                    </strong>
                </h1>
                <h1 style="float:right;">
                    <strong>
                        <img src="{{URL::to('img/whatsaap.png')}}" style="width:45px;" class="whatsaap">313 816 7962
                    </strong>
                </h1>
            </div>
        </section>
        <img class="media-promo-image hidden-xs" alt="" src="{{URL::to('img/placeholders/photos/web_site_9.jpg')}}">
        <img class="media-promo-image visible-xs" alt="" src="{{URL::to('img/placeholders/photos/web_site_9_400.jpg')}}">
    </div>

    <!-- Promo Features -->
    <section class="site-content site-section border-bottom " style="background-color: #ebeff2;">
        <div class="container">
            <div class="row" id="catalog">
                <h1 class="site-heading h2" style="margin-bottom:35px;">
                    <a href="#nuestro-catalogo" name="nuestro-catalogo">
                        <strong>Nuestro Catalogo</strong>
                    </a>
                </h1>
                @foreach($products as $product)
                    <article class="col-md-3 col-sm-4 col-xs-12 thumb">
                        <div class="widget" itemscope itemtype="http://schema.org/Product">
                            <div class="widget-content widget-content-mini themed-background-muted">
                                <div class="pull-right text-muted"><span itemprop="price"> $ {{ $product->price }} </span></div>
                                <i class="fa fa-heart"></i> <span itemprop="name">{{ $product->short_name }} </span>
                            </div>
                            <div class="widget-content text-center">
                                <a href="#producto={{$product->id}}">
                                    <div class="thumbnail" style="height:200px; overflow:hidden; margin-bottom:0px;" itemprop="image">
                                        <img class="img-responsive" src="{{$product->path_small_image}}" alt="Producto: {{$product->name}} | Alba Boutique" title="Producto: {{$product->name}} | Alba Boutique" data-name="{{$product->name}}" data-ref="{{ $product->id }}" data-description="{{ $product->description }}" data-size="{{ $product->sizes }}" data-price =" {{$product->price }}", data-download="{{route('product.download', $product->id)}}" data-imgsrc ="{{$product->image}}"/>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
            <div class="row text-center">
                {{ $products->fragment('nuestro-catalogo')->links('pagination.appui-lg') }}
            </div>

            {{-- Regular Fade --}}
            <article id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" itemscope itemtype="http://schema.org/Product">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h1 class="modal-title h3">
                                <strong id="name" itemprop="name"></strong>, Ref: <span id="ref" itemprop="sku"></span>
                            </h1>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-8" id="product-image">
                                    <img src="" class="img-responsive" itemprop="image">
                                </div>
                                <div class="col-md-4" id="product-content">
                                    <div class="block">
                                        <h3><strong class="text-info">Precio: </strong> $<span id="price" itemprop="price"></span></h3>
                                        <h3 style="margin-top:0px;" class="text-info"><strong>Tallas  </strong><span id="size" class="h4"></span></h3>
                                          
                                        <p id="description" style="font-size:15px;" itemprop="description"></p>
                                        <div style="position:absolute; bottom:5px; right:10px;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="btn btn-effect-ripple btn-success">
                                <i class="fa fa-phone"></i> 313 816 7962
                            </div>
                            <a href="#" id="download" type="button" class="btn btn-effect-ripple btn-primary" itemscope itemtype="http://schema.org/DownloadAction"><i class="hi hi-save"></i> Descargar</a>
                        </div>
                    </div>
                </div>
            </article>
            {{-- END Regular Fade --}}
        </div>
    </section>
    {{-- END Promo Features --}}

    {{-- Promo #1 --}}
    <section class="site-section site-content border-bottom overflow-hidden">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 push">
                    <article>
                        <h1 class="site-heading h3"><strong>La Mejor Calidad</strong></h1>
                        <p class="feature-text text-muted push-bit">En <strong>Alba Boutique</strong> garantizamos la mejor calidad en nuestras prendas. Damos 100% Garantía en todos nuestros Productos</p>
                    </article>
                    <article>
                        <h1 class="site-heading h3"><strong>Estilo y Belleza</strong></h1>
                        <p class="feature-text text-muted push-bit">En <strong>Alba Boutique</strong> tenemos estilo único!. Nuestras prendas son las más bellas y estilo</p>
                    </article>
                    <article>
                        <h1 class="site-heading h3"><strong>Grandes Descuentos</strong></h1>
                        <p class="feature-text text-muted push-bit">Nos encanta comprar y estar a la Moda, pero mucho mejor si hay Descuentos!!</p>
                    </article>
                    <article itemscope itemtype="http://schema.org/LocalBusiness">
                        <h1 class="site-heading h3"><strong>Envios a Todo Colombia</strong></h1>
                        <p class="feature-text "><strong itemprop="legalName">Alba Boutique</strong> hace envios a todo Colombia. Llámanos o escribenos por WhatsApp <strong itemprop="telephone">313 816 7962</strong> - Email: <strong itemprop="email">contacto@alba.boutique</strong></p>
                    </article>
                </div>
                <picture class="col-sm-6 clearfix push-bit hidden-xs">
                    <img src="{{ URL::to('img/placeholders/photos/web_site_lateral_2.jpg') }}" alt="Panty Alba Boutique" class="img-responsive pull-right visibility-none" data-toggle="animation-appear" data-animation-class="animation-fadeInLeft" data-element-offset="100" style="max-width: 330px; margin-right: -60px;">
                </picture>
            </div>
        </div>
    </section>
    <!-- END Promo #1 -->

    <!-- Testimonials -->
    <section class="site-content site-section themed-background-muted">
        <div class="container">
            <div id="testimonials-carousel" class="carousel slide carousel-html" data-ride="carousel" data-interval="4000">
                <div class="carousel-inner text-center">
                    <article class="active item" itemscope itemtype="http://schema.org/Review">
                        <blockquote>
                            <p><img src="{{ URL::to('img/placeholders/avatars/05.jpg') }}" alt="Maria Pinzón - Alba Boutique" class="img-circle img-thumbnail img-thumbnail-avatar-2x"></p>
                            <h3 itemprop="comment">La recomiendo. La ropa es súper linda :)</h3>
                            <footer><em><strong itemprop="author">Maria Pinzón</strong>, <span itemprop="contentLocation">Villavicencio</span></em></footer>
                        </blockquote>
                    </article>
                    <article class="item" itemscope itemtype="http://schema.org/Review">
                        <blockquote>
                            <p><img src="{{ URL::to('img/placeholders/avatars/06.jpg') }}" alt="Nubia Puentes - Alba Bouitque" class="img-circle img-thumbnail img-thumbnail-avatar-2x"></p>
                            <h3 itemprop="comment">La calidad y comodidad es lo mejor!. Muchas Gracias</h3>
                            <footer><em><strong itemprop="author">Nubia Puentes</strong>, <span itemprop="contentLocation">Villavicencio</span></em></footer>
                        </blockquote>
                    </article>
                    <article class="item" itemscope itemtype="http://schema.org/Review">
                        <blockquote>
                            <p><img src="{{ URL::to('img/placeholders/avatars/12.jpg') }}" alt="Sonia Orteg - Alba Boutiqe" class="img-circle img-thumbnail img-thumbnail-avatar-2x"></p>
                            <h3 itemprop="comment">Tiene prendas a muy buen precio, sobre todo la ropa interior</h3>
                            <footer><em><strong itemprop="author">Sonia Ortega</strong>, <span itemprop="contentLocation">Bogotá</span></em></footer>
                        </blockquote>
                    </article>
                    <article class="item" itemscope itemtype="http://schema.org/Review">
                        <blockquote>
                            <p><img src="{{ URL::to('img/placeholders/avatars/09.jpg') }}" alt="Vanes Hernandez - Alba Boutique" class="img-circle img-thumbnail img-thumbnail-avatar-2x"></p>
                            <h3 itemprop="comment">Estoy Feliz con Alba Boutique, me encanta la atención</h3>
                            <footer><em><strong itemprop="author">Vanesa Hernandez</strong>, <span itemprop="contentLocation">Acacias</span></em></footer>
                        </blockquote>
                    </article>
                </div>
            </div>
        </div>
    </section>
    <!-- END Testimonials --> 
@stop

@section('extra-js')
    {{ HTML::script('assets/website/js/pages/appCatalog.js') }}
@stop