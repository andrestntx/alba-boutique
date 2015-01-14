@extends('dashboard.pages.layout')
@section('title') Productos @stop
@section('title_page') Productos <a href="{{ route('admin.create') }}" class="btn btn-primary"> <i class="fa fa-plus"></i> Agregar</a> 
@stop
@section('content_body_page')
	<div class="row" id="catalog">
	    @foreach($products as $product)
	        <div class="col-md-3 col-sm-4 col-xs-6 thumb">
	        	<a href="{{ route('admin.edit', $product->id) }}" class="widget">
		        	<div class="widget">
						<div class="widget-content widget-content-mini themed-background-muted">
							<div class="pull-right text-muted">{{ $product->id }}</div>
							<i class="fa fa-heart"></i> {{ $product->short_name }}
						</div>
						<div class="widget-content text-center">
							<div class="thumbnail" style="height:180px; overflow:hidden;">
			                	<img class="img-responsive" src="{{$product->image}}"/>
			            	</div>
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