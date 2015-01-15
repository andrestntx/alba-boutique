@extends('dashboard.pages.layout')
@section('class_icon_page') fa fa-heart @stop
@section('title')
	@if($product->exists) Producto: {{ $product->id }} @else Nuevo Producto @endif
@stop
@section('title_page')
	@if($product->exists) Producto: {{ $product->id }} @else Nuevo Producto @endif
@stop
@section('breadcrumbs')
	@if($product->exists)
		{{ Form::open(['route' => ['admin.destroy', $product->id], 'method' => 'DELETE', 'style' => 'position:relative; float:right; vertical-align: middle;']) }}
			<button type="submit" class="btn btn-effect-ripple btn-danger">
				<i class="gi gi-skull"></i> Eliminar
			</button>
		{{ Form::close() }}
	@endif
@stop

@section('content_body_page')
	<div class="row">

		{{ Form::model($product, $form_data + ['id' => 'form-products']) }}
			<div class="col-md-6 col-md-offset-3">
				<!-- END Validation Wizard Content -->
                @include('dashboard.includes.alerts')
			</div>
			<div class="col-lg-6 col-sm-5 col-xs-12">
				<div class="block">
					<div class="block-title">
						<h2>Foto</h2>
					</div>
					<div class="row">
						<div class="col-xs-10 col-xs-offset-1">
							<input id="image" name="image" type="file" class="file" data-show-upload="false" data-show-remove="false">
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-sm-7 col-xs-12">
				<div class="block">
					<div class="block-title">
						<h2>Datos del Producto</h2>
						<label class="switch switch-primary" style="padding: 5px 15px 4px; float:right;" title="¿Producto Visible?">
							@if($product->visible)
								<input type="checkbox" value="1" name="visible" checked><span></span>
							@else
								<input type="checkbox" value="1" name="visible"><span></span>
							@endif
						</label>
					</div>
					<div class="form-horizontal form-bordered">
						<div class="form-group">
							{{ Form::label('id', 'Referencia', ['class' => 'col-md-3 control-label']) }}
							<div class="col-md-8">
								@if($product->exists)
									{{ Form::text('id', null, ['class' => 'form-control', 'readonly']) }}
								@else
									{{ Form::text('id', null, ['class' => 'form-control']) }}
								@endif
							</div>
						</div>
						<div class="form-group">
							{{ Form::label('name', 'Nombre', ['class' => 'col-md-3 control-label']) }}
							<div class="col-md-8">
								{{ Form::text('name', null, ['class' => 'form-control']) }}
							</div>
						</div>
						<div class="form-group">
							{{ Form::label('description', 'Descripción', ['class' => 'col-md-3 control-label']) }}
							<div class="col-md-8">
								{{ Form::textarea('description', null, ['class' => 'form-control', 'rows' => '3']) }}
							</div>
						</div>
						<div class="form-group">
							{{ Form::label('sizes', 'Tallas', ['class' => 'col-md-3 control-label']) }}
							<div class="col-md-8">
								{{ Form::text('sizes', null, ['class' => 'form-control', 'placeholder' => 'S, M, L']) }}
							</div>
						</div>
						<div class="form-group">
							{{ Form::label('price', 'Precio', ['class' => 'col-md-3 control-label']) }}
							<div class="col-md-8">
								{{ Form::text('price', null, ['class' => 'form-control']) }}
							</div>
						</div>
						<div class="form-group form-actions">
						    <div class="col-md-12">
						        <button type="submit" class="btn btn-effect-ripple btn-primary" style="position:relative; float:right;">
						        	<i class="fa fa-send"></i> Guardar
						       	</button>
						    </div>
						</div>
					</div>
				</div>
			</div>

		{{Form::close()}}
	</div>
@stop

@section('extra-js')
  <script type="text/javascript">
  $('#image').fileinput({
      initialPreview: "<img src=''  title='Foto del Producto' class='img-responsive' style='max-width:360px; overflow:hidden;'>",
      previewSettings: { image: {width: "100%", height: "auto"} }
  });
  </script>

  {{-- HTML::script('assets/js/plugins/forms/file-validator.js') --}}
  {{ HTML::script('assets/dashboard/js/pages/formProducts.js'); }}
  <script> $(function (){ formProducts.init(); });</script>
@stop

{{$product->image}}