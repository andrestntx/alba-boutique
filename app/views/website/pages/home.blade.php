@extends('website.layout')
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
            <div class="row row-items">
                <h1 class="site-heading h2" style="margin-bottom:35px;">
                    <a href="#nuestro-catalogo" name="nuestro-catalogo">
                        <strong>Catalogo de Productos</strong>
                    </a>
                </h1>
                @foreach($categories as $category)
                    <div class="col-md-4 col-sm-6 text-center">
                        <a href="{{route('catalogo.show', $category->name_url)}}" class="post">
                            <div class="post-image" style="height:280px;">
                                <img src="{{URL::to($category->image)}}" alt="" class="img-responsive">
                            </div>
                            <h2 class="h3">
                                <strong class="text-info">{{$category->name}}</strong>
                            </h2>
                            <p>{{ $category->description }}</p>
                        </a>
                    </div>
                @endforeach
            </div>
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