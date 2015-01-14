@extends('dashboard.pages.layout')

@section('content_body_page')
  <div class="row">
      <div class="col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2">
          <!-- Validation Wizard Block -->
          <div class="block">
              <!-- Validation Wizard Title -->
              <div class="block-title">
                  <h2>@yield('title_form')</h2>
              </div>
              <!-- END Validation Wizard Title -->
                @include('dashboard.includes.alerts')
              <!-- Validation Wizard Content -->
              <div class="form-horizontal form-bordered">
                @yield('form')
              </div>
              <!-- END Validation Wizard Content -->
                @include('dashboard.includes.alerts')
          </div>
          <!-- END Validation Wizard Block -->
      </div>
  </div>

@stop
