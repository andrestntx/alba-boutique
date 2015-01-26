@extends('website.layout')
@section('title') Catálogo de Productos - Alba Boutique @stop
@section('meta-description') Catálogo de Productos Alba Boutique. Pijamas para Mujer, Ropa Interior Femenina, Ropa Deportiva para Mujer, Ropa Interior para Hombre @stop
@section('content')
    <!-- Intro -->
    <section class="site-section site-section-top site-section-light themed-background-dark">
        <div class="container">
            <h1 class="text-center animation-fadeInQuickInv"><strong>Catálogo de Productos Alba Boutique</strong></h1>
        </div>
    </section>
    <!-- END Intro -->

    <!-- Portfolio -->
    <section class="site-content site-section">
        <div class="container">
            <div class="row row-items">
                @foreach($categories as $category)
                    <div class="col-md-4">
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
    <!-- END Portfolio -->
    
@stop
@section('extra-js')

@stop
