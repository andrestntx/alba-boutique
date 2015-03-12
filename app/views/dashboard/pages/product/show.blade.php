@extends('dashboard.pages.layout')
@section('class_icon_page') gi gi-coat_hanger @stop
@section('title') 
	{{ $category->name }} - Producto: {{ $product->id }} 
@stop
@section('title_page') 
	<a href="{{route('admin.categorias.productos.index', $category->id)}}">{{ $category->name }}</a> -  Producto: {{ $product->id }} 
@stop
@section('breadcrumbs')
	@if($product->exists)
		<a href="{{ route('admin.categorias.productos.edit', [$category->id, $product->id]) }}" style="position:relative; float:right; vertical-align: middle;" class="btn btn-effect-ripple btn-warning">
			<i class="fa fa-pencil"></i> Editar
		</a>
	@endif
@stop

@section('content_body_page')
	<div class="row">
		<div class="col-md-7 col-sm-5 col-xs-12">
			<div class="block">
				<div class="block-title">
					<h2>Foto</h2>
				</div>
				<div class="row">
					<div class="col-xs-10 col-xs-offset-1">	
						{{ HTML::image($product->image, $product->name, ['style' => 'width:100%;']) }}
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-5 col-sm-7 col-xs-12">
			<div class="block">
				<div class="block-title">
					<h2> Producto: {{ $product->name }} </h2>
				</div>
                    <p class="h4"><strong class="text-info">Precio Costo: </strong> 
                        ${{ $product->formated_price }}
                    </p>
                    <p class="h4"><strong class="text-success">Precio Detal: </strong> 
                        ${{ $product->formated_sale_price }}
                    </p>
                    <p class="h4"><strong class="text-danger">Precio Por Mayor: </strong> 
                        ${{ $product->formated_wholesale_price }}
                    </p>
                    <p class="h4"><strong class="text-muted">Tallas: </strong> 
                        {{ $product->sizes }}
                    </p>
                    <p class="h4"><strong class="text-muted">Descripción: </strong> 
                        {{ $product->description }}
                    </p>
			</div>
		</div>	
	</div>
@stop