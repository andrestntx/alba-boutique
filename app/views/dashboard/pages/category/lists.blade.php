@extends('dashboard.pages.layout')
@section('title') Categorías @stop
@section('title_page')
	<i class="gi gi-fins"></i>  Categorías 
 	<a href="{{ route('admin.categorias.create') }}" class="btn btn-primary"> 
 		<i class="fa fa-plus"></i> Agregar
	</a> 
@stop
@section('content_body_page')
	<div class="row" id="catalog">
	    @foreach($categories as $category)
	        <div class="col-md-3 col-sm-4 col-xs-12 thumb">
	        	<a href="{{ route('admin.categorias.edit', $category->id) }}" class="widget">
		        	<div class="widget">
						<div class="widget-content widget-content-mini themed-background-muted">
							<i class="fa fa-folder"></i> {{ $category->short_name }}
						</div>
						<div class="widget-content text-center">
							<div class="thumbnail" style="height:180px; overflow:hidden;">
			                	<img class="img-responsive" src="{{URL::to($category->small_image)}}"/>
			            	</div>
						</div>
					</div>
				</a>
	        </div>
	    @endforeach
	</div>
	<div class="row text-center">
	    {{ $categories->links() }}
	</div>
@stop