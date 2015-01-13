@extends('dashboard.pages.layout')
@section('title') Productos @stop
@section('title_page') Productos @stop
@section('content_body_page')
	<div class="row" id="catalog">
	    @foreach($products as $product)
	        <div class="col-md-3 col-sm-4 col-xs-6 thumb">
	        	<a href="{{ route('admin.edit', $product->ref) }}" class="widget">
		        	<div class="widget">
						<div class="widget-content widget-content-mini themed-background-muted">
							<div class="pull-right text-muted">{{ $product->ref }}</div>
							<i class="fa fa-heart"></i> {{ $product->short_name }}
						</div>
						<div class="widget-content text-center">
							<div class="thumbnail">
			                	<img class="img-responsive" src="{{$product->image}}" data-name="{{$product->name}}" data-ref="{{ $product->ref }}" data-description="{{ $product->description }}" data-size="{{ $product->sizes }}" data-price =" {{$product->price }}"/>
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