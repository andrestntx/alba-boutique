@extends('dashboard.layout')
@section('content_page')
	<!-- Blank Header -->
    <div class="content-header">
        <div class="row">
            <div class="col-xs-12">
                <div class="header-section">
                    <h1 class="h2">
                        <i class="@yield('class_icon_page')"></i> 
                        @yield('title_page', 'Alba Boutique')
                    </h1>
                </div>
            </div>
        </div>
    </div>
    <!-- END Blank Header -->
    @yield('content_body_page')
@stop