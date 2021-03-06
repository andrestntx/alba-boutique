@extends('dashboard.pages.layout')
@section('title') Productos de {{ $category->name }} @stop
@section('title_page')
	<i class="gi gi-coat_hanger"></i> {{ $category->name }}
 	<a href="{{ route('admin.categorias.productos.create', $category->id) }}" class="btn btn-primary" title="Agregar"> 
 		<i class="fa fa-plus"></i>
	</a> 

	<a href="{{ route('admin.categorias.productos.precios-pdf', $category->id) }}" style="margin: 0 3px;" class="btn btn-effect-ripple btn-success pull-right" title="Lista de Precios" target="_blank">
		<i class="hi hi-usd"></i> 
	</a>

	<a href="{{ route('admin.categorias.productos.pdf', $category->id) }}" class="btn btn-effect-ripple btn-warning pull-right" target="_blank" title="PDF con Productos">
		<i class="fa fa-file-text"></i>
	</a>
@stop
@section('content_body_page')
	<div class="row" id="catalog">
	    @foreach($products as $product)
	        <div class="col-md-4 col-sm-6 col-xs-12 thumb">
	        	<a href="{{ route('admin.categorias.productos.show', [$category->id, $product->id]) }}" class="widget">
		        	<div class="widget">
						<div class="widget-content widget-content-mini themed-background-muted" style="height:35px; overflow: hidden;">
							<div class="pull-right text-muted">Ref: {{ $product->id }}</div>
							<i class="fa fa-heart"></i> {{ $product->short_name }}
						</div>
						<div class="widget-content text-center">
							<div class="thumbnail" style="height:230px; overflow:hidden;">
			                	<img class="img-responsive" src="{{URL::to($product->small_image)}}"/>
			            	</div>
						</div>
						<div class="widget-content widget-content-mini themed-background-muted">
							<div class="pull-right text-danger">
								<i class="fa fa-dollar"></i> {{ $product->formated_wholesale_price }}
							</div>
							<i class="fa fa-dollar"></i> {{ $product->formated_sale_price }}
						</div>
					</div>
				</a>
	        </div>
	    @endforeach
	</div>
	<div class="row text-center">
	    {{ $products->links() }}
	</div>
@stop