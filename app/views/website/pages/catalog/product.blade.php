@extends('website.layout')
@section('extra-css') 
    <style type="text/css">
        #product-content h2, #product-content p{
            font-size: 19px !important;
            margin: 5px 0;
        }

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
@section('title') {{ $product->name }} | Alba Boutique @stop
@section('meta-description') {{ $product->description }} | Alba Boutique @stop
@section('content')
    <div itemscope itemtype="http://schema.org/Product">
        <!-- Intro -->
        <section class="site-section site-section-top site-section-light themed-background-dark">
            <div class="container">
                <h1 class="text-center animation-fadeInQuickInv"><strong itemprop="name">{{ $product->name }}</strong></h1>
            </div>
        </section>
        <!-- END Intro -->

        <!-- Project Navigation -->
        <section class="site-content site-section-mini themed-background-muted border-bottom">
            <div class="container">
                <div class="site-block clearfix">
                    <ul class="breadcrumb breadcrumb-top" style="font-size:1em;">
                        <li>
                            <a href="{{route('catalogo.index')}}">
                                Catálogo
                            </a>
                        </li>
                        <li>
                            <a href="{{route('catalogo.show', $product->category_name_url)}}">
                                {{$product->category_name}}
                            </a>
                        </li>
                        <li> {{$product->name}} </li>
                    </ul>
                </div>
            </div>
        </section>
        <!-- END Project Navigation -->


        <!-- Project Info -->
        <section class="site-content site-section border-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1 site-block">
                        <!-- Carousel & Info -->
                        <div class="row">
                            <div class="col-sm-8">
                                <img src="{{URL::to($product->image)}}" itemprop="image" alt="{{$product->name}}" class="img-responsive" itemprop="image">
                            </div>
                            <div class="col-sm-4" id="product-content">
                                <div class="block">
                                    <h2 id="description"  itemprop="description"> {{ $product->description }} </h2>
                                    <p><strong class="text-info" tyle="font-size:19px;">Precio: </strong> 
                                        $<span id="price" itemprop="price">{{ $product->formated_sale_price }}</span>
                                    </p>
                                    <p>
                                        <strong class="text-info">Tallas:  </strong>
                                        <span id="size"> {{ $product->sizes }} </span>
                                    </p>     
                                    <p>
                                        <strong class="text-info">Referencia:  </strong>
                                        <span id="ref" itemprop="sku"> {{ $product->id }} </span>
                                    </p>
                                    <a href="tel: 313 816 7962" class="btn btn-effect-ripple btn-success">
                                        <i class="fa fa-phone"></i> 313 816 7962
                                    </a>
                                    <a href="{{ URL::to('descargar-producto/'.$product->id) }}" id="download" type="button" class="btn btn-effect-ripple btn-primary" itemscope="" itemtype="http://schema.org/DownloadAction"><i class="hi hi-save"></i> Descargar</a>
                     
                                </div>
                            </div>
                        </div>
                        <!-- END Carousel & Info -->
                    </div>
                </div>
            </div>
        </section>
        <!-- END Project Info -->
    </div>

    <!-- Project Info -->
    <section class="site-content site-section border-bottom">
        <div class="container" id="catalog">
            <div class="row">
                <div class="col-md-12 site-block">
                    <h3 class="site-heading h3" style="margin-bottom:35px;">
                        Más Productos de {{$product->category_name}}
                    </h3>
                    @foreach($product->relatedProducts() as $relatedProduct)
                        <article class="col-md-3 col-sm-4 col-xs-12 thumb">
                            <div class="widget" itemscope itemtype="http://schema.org/Product">
                                <div class="widget-content widget-content-mini themed-background-muted">
                                    <div class="pull-right text-muted"><span itemprop="price"> $ {{ $relatedProduct->formated_sale_price }} </span></div>
                                    <i class="fa fa-heart"></i> <span itemprop="name">{{ $relatedProduct->short_name }} </span>
                                </div>
                                <div class="widget-content text-center">
                                    <a href="{{ route('catalogo.producto', array($category->name_url, $relatedProduct->name_url)) }}">
                                        <div class="thumbnail" style="height:200px; overflow:hidden; margin-bottom:0px;" itemprop="image">
                                            <img class="img-responsive" src="{{URL::to($relatedProduct->small_image)}}" alt="Producto: {{$relatedProduct->name}} | Alba Boutique" title="Producto: {{$relatedProduct->name}} | Alba Boutique"/>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- END Project Info -->
    
@stop
@section('extra-js')

@stop
