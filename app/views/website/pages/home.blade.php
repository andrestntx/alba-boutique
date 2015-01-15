@extends('website.layout')
@section('extra-css')
    {{-- Css Catalog --}}
    {{ HTML::style('assets/website/css/plugins/catalog.css') }}
@stop
@section('content') 
	<!-- Intro + Action -->
            <section class="site-section site-section-top site-section-light themed-background-dark-default">
                <div class="container">
                    <div class="push text-center" style="margin-bottom:0px;">
                        <h1 class="animation-fadeInQuick2Inv" style="margin-top:0px;">
                            <strong> Belleza y Dulzura a la hora de vestir </strong>
                        </h1>
                        <h3 class="text-light-op animation-fadeInQuickInv push-bit" style="margin-top:0px; margin-bottom:15px;">
                            <strong> <em>Más Hermosa que la primera luz del día</em></strong>
                        </h3>
                    </div>
                    <div class="site-promo-img visibility-none" data-toggle="animation-appear" data-animation-class="animation-slideUpQuick" data-element-offset="0">
                        <img src="{{ URL::to('img/placeholders/photos/web_site.jpg') }}" alt="">
                    </div>
                </div>
            </section>
            <!-- END Intro + Action -->

            <!-- Promo Features -->
            <section class="site-content site-section border-bottom">
                <div class="container">
                    <div class="row" id="catalog">
                        <h2 class="site-heading " style="margin-bottom:35px;">
                            <a href="#nuestro-catalogo" name="nuestro-catalogo">
                                <strong>Nuestro Catalogo</strong>
                            </a>
                        </h2>
                        @foreach($products as $product)
                            <div class="col-md-3 col-sm-4 col-xs-12 thumb">
                                <div class="widget" itemscope itemtype="http://schema.org/Product">
                                    <div class="widget-content widget-content-mini themed-background-muted">
                                        <div class="pull-right text-muted">Ref: <span itemprop="sku"> {{ $product->id }} </span></div>
                                        <i class="fa fa-heart"></i> <span itemprop="name">{{ $product->short_name }} </span>
                                    </div>
                                    <div class="widget-content text-center">
                                        <div class="thumbnail" style="height:180px; overflow:hidden;" itemprop="image">
                                            <img class="img-responsive" src="{{$product->image}}" alt="Producto: {{$product->name}} | Alba Boutique" title="Producto: {{$product->name}} | Alba Boutique" data-name="{{$product->name}}" data-ref="{{ $product->id }}" data-description="{{ $product->description }}" data-size="{{ $product->sizes }}" data-price =" {{$product->price }}", data-download="{{route('product.download', $product->id)}}"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                    <div class="row text-center">
                        {{ $products->fragment('nuestro-catalogo')->links('pagination.appui-lg') }}
                    </div>

                    {{-- Regular Fade --}}
                    <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h3 class="modal-title"><strong id="name"></strong>, Ref: <span id="ref"></span></h3>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-8" id="product-image">
                                            <img src="" class="img-responsive">
                                        </div>
                                        <div class="col-md-4" id="product-content">
                                            <div class="block">
                                                <h3 class="text-info"><strong>Descripción</strong></h3>
                                                <p id="description" style="font-size:16px;"></p>

                                                <h3 style="margin-top:0px;" class="text-info"><strong>Tallas</strong></h3>
                                                <div id="size"></div>  

                                                <h3>
                                                    <strong class="text-info">Precio: </strong> $<span id="price"></span>
                                                </h3>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <a href="#" id="download" type="button" class="btn btn-effect-ripple btn-primary">Descargar</a>
                                    <button type="button" class="btn btn-effect-ripple btn-danger" data-dismiss="modal">Cerrar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- END Regular Fade --}}
                </div>
            </section>
            {{-- END Promo Features --}}

            {{-- Promo #1 --}}
            <section class="site-section site-content border-bottom overflow-hidden">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 push">
                            <h3 class="site-heading"><strong>La Mejor Calidad</strong></h3>
                            <p class="feature-text text-muted push-bit">En <strong>Alba Boutique</strong> garantizamos la mejor calidad en nuestras prendas. Damos 100% Garantía en todos nuestros Productos</p>

                            <h3 class="site-heading"><strong>Un Gran estilo!</strong></h3>
                            <p class="feature-text text-muted push-bit">En <strong>Alba Boutique</strong> tenemos estilo único!. Nuestras prendas tienen ese toque diferente</p>
                            <div itemscope itemtype="http://schema.org/LocalBusiness">
                                <h3 class="site-heading"><strong>Envios a Todo Colombia</strong></h3>
                                <p class="feature-text "><strong itemprop="legalName">Alba Boutique</strong> hace envios a todo Colombia. Llámanos o escribenos por WhatsApp <strong itemprop="telephone">313 816 7962</strong> - Email: <strong itemprop="email">contacto@alba.boutique</strong></p>
                            </div>
                        </div>
                        <div class="col-sm-6 clearfix push-bit">
                            <img src="{{ URL::to('img/placeholders/photos/web_site_lateral.jpg') }}" alt="" class="img-responsive pull-right visibility-none" data-toggle="animation-appear" data-animation-class="animation-fadeInLeft" data-element-offset="-200" style="max-width: 460px; margin-right: -100px;">
                        </div>
                    </div>
                </div>
            </section>
            <!-- END Promo #1 -->

            <!-- Promo #3 -->

            <!-- Testimonials -->
            <section class="site-content site-section themed-background-muted">
                <div class="container">
                    <div id="testimonials-carousel" class="carousel slide carousel-html" data-ride="carousel" data-interval="4000">
                        <div class="carousel-inner text-center">
                            <div class="active item" itemscope itemtype="http://schema.org/Review">
                                <blockquote>
                                    <p><img src="{{ URL::to('img/placeholders/avatars/05.jpg') }}" alt="avatar" class="img-circle img-thumbnail img-thumbnail-avatar-2x"></p>
                                    <h3 itemprop="comment">La recomiendo. La ropa es súper linda :)</h3>
                                    <footer><em><strong itemprop="author">Maria Pinzón</strong>, <span itemprop="contentLocation">Villavicencio</span></em></footer>
                                </blockquote>
                            </div>
                            <div class="item" itemscope itemtype="http://schema.org/Review">
                                <blockquote>
                                    <p><img src="{{ URL::to('img/placeholders/avatars/06.jpg') }}" alt="avatar" class="img-circle img-thumbnail img-thumbnail-avatar-2x"></p>
                                    <h3 itemprop="comment">La calidad y comodidad es lo mejor!. Muchas Gracias</h3>
                                    <footer><em><strong itemprop="author">Nubia Puentes</strong>, <span itemprop="contentLocation">Villavicencio</span></em></footer>
                                </blockquote>
                            </div>
                            <div class="item" itemscope itemtype="http://schema.org/Review">
                                <blockquote>
                                    <p><img src="{{ URL::to('img/placeholders/avatars/12.jpg') }}" alt="avatar" class="img-circle img-thumbnail img-thumbnail-avatar-2x"></p>
                                    <h3 itemprop="comment">Tiene prendas a muy buen precio, sobre todo la ropa interior</h3>
                                    <footer><em><strong itemprop="author">Sonia Ortega</strong>, <span itemprop="contentLocation">Bogotá</span></em></footer>
                                </blockquote>
                            </div>
                            <div class="item" itemscope itemtype="http://schema.org/Review">
                                <blockquote>
                                    <p><img src="{{ URL::to('img/placeholders/avatars/09.jpg') }}" alt="avatar" class="img-circle img-thumbnail img-thumbnail-avatar-2x"></p>
                                    <h3 itemprop="comment">Estoy Feliz con Alba Boutique, me encanta la atención</h3>
                                    <footer><em><strong itemprop="author">Vanesa Hernandez</strong>, <span itemprop="contentLocation">Acacias</span></em></footer>
                                </blockquote>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END Testimonials --> 
@stop

@section('extra-js')
    {{ HTML::script('assets/website/js/pages/appCatalog.js') }}
@stop