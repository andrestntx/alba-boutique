@extends('dashboard.pages.layout')
@section('class_icon_page') gi gi-fins @stop
@section('title') 
	@if($category->exists) Categoría: {{ $category->name }} @else Nueva Categoría @endif 
@stop
@section('title_page') 
	@if($category->exists) Categoría: {{ $category->name }} @else Nueva Categoría @endif 
@stop
@section('breadcrumbs')
	@if($category->exists)
		{{ Form::open(['route' => ['admin.categorias.destroy', $category->id], 'method' => 'DELETE', 'style' => 'position:relative; float:right; vertical-align: middle;']) }}
			<button type="submit" class="btn btn-effect-ripple btn-danger">
				<i class="gi gi-skull"></i> Eliminar
			</button>
		{{ Form::close() }}
	@endif
@stop

@section('content_body_page')
	<div class="row">

		{{ Form::model($category, $form_data + ['id' => 'form-categories']) }}
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
						<h2>Datos de la Categoría</h2>
						<label class="switch switch-primary" style="padding: 5px 15px 4px; float:right;" title="¿Categoría Visible?">
							@if($category->visible)
								<input type="checkbox" value="1" name="visible" checked><span></span> 
							@else
								<input type="checkbox" value="1" name="visible"><span></span>
							@endif
						</label>
					</div>
					<div class="form-horizontal form-bordered">
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
      initialPreview: "<img src='{{url($category->image)}}'  title='Foto de la Categoría' class='img-responsive' style='max-width:360px; overflow:hidden;'>",
      previewSettings: { image: {width: "100%", height: "auto"} }
  });
  </script>
  
  {{-- HTML::script('assets/js/plugins/forms/file-validator.js') --}}
  {{ HTML::script('assets/dashboard/js/pages/formProducts.js'); }}
  <script> $(function (){ formProducts.init(); });</script>
@stop