@extends('layout')
	@section('title') Bienvenido al Dashboard @stop
	@section('css')
		{{-- Css Files --}}
		@include('dashboard.includes.css')
		@yield('extra-css')
	@stop
	@section('body')
		{{-- Content Body --}}
		<div id="page-wrapper" class="page-loading">
			<div class="preloader">
                <div class="inner">
                    <!-- Animation spinner for all modern browsers -->
                    <div class="preloader-spinner themed-background hidden-lt-ie10"></div>

                    <!-- Text for IE9 -->
                    <h3 class="text-primary visible-lt-ie10"><strong>Cargando..</strong></h3>
                </div>
            </div>
            <div id="page-container" class="header-fixed-top sidebar-visible-lg-full">
                <!-- Alternative Sidebar -->
                @include('dashboard.includes.right_sidebar')
                <!-- END Alternative Sidebar -->

                <!-- Main Sidebar -->
                @include('dashboard.includes.sidebar')
                <!-- END Main Sidebar -->

                <!-- Main Container -->
                <div id="main-container">
                    @include('dashboard.includes.header')
                    <!-- END Header -->

                    <!-- Page content -->
                    <div id="page-content" style="position:relative;">
                        @yield('content_page', 'Contenido del Dashboard')
                    </div>
                    <!-- END Page Content -->
                </div>
                <!-- END Main Container -->
            </div>
            <!-- END Page Container -->
			
		</div>
	@stop
	@section('js')
		{{-- Js Files --}}
		@include('dashboard.includes.script')
		@yield('extra-js')
	@stop