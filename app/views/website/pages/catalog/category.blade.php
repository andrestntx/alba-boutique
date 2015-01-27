@extends('website.layout')
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
@section('title') Catálogo de {{ $category->name }} | Alba Boutique @stop
@section('meta-description') {{ $category->description }} | Alba Boutique @stop
@section('content')
    <!-- Intro -->
    <section class="site-section site-section-top site-section-light themed-background-dark" style="padding-top:110px;">
        <div class="container">
            <h1 class="text-center animation-fadeInQuickInv"><strong>Catálogo de {{ $category->name }}</strong></h1>
            <p class="text-center animation-fadeInQuickInv col-md-10 col-md-offset-1" style="margin-bottom:0px; font-size:17px; "> {{ $category->description }}</p>
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
                        {{$category->name}}
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <!-- END Project Navigation -->

    <!-- Portfolio -->
    <section class="site-content site-section" style="background-color: #ebeff2; padding-top:10px;">
        <div class="container" id="catalog">
            <div class="row row-items">
                @foreach($category->products as $product)
                    <article class="col-md-4 col-sm-6 col-xs-12 thumb">
                        <div class="widget" itemscope itemtype="http://schema.org/Product">
                            <div class="widget-content widget-content-mini themed-background-muted">
                                <div class="pull-right text-muted"><span itemprop="price"> $ {{ $product->formated_sale_price }} </span></div>
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
    <!-- END Portfolio -->
    
@stop
@section('extra-js')

@stop
