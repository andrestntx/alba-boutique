@extends('dashboard.layout')
@section('content_page')
	<!-- Blank Header -->
    <div class="content-header">
        <div class="row">
            <div class="col-sm-7">
                <div class="header-section">
                    <h1><i class="@yield('class_icon_page')"></i> @yield('title_page', 'Educación Continuada')</h1>
                </div>
            </div>
            <div class="col-sm-5 hidden-xs">
                <div class="header-section">
                    @yield('breadcrumbs')
                </div>
            </div>
        </div>
    </div>
    <!-- END Blank Header -->
    @yield('content_body_page')
@stop