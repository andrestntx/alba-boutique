@extends('dashboard.pages.layout')
@section('title') Producto {{ $product->name }} @stop
@section('title_page') Producto {{ $product->ref }}, {{ $product->name }} @stop
@section('content_body_page')

@stop