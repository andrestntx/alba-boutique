@extends('dashboard.pages.layout')
@section('title') Mensajes @stop
@section('title_page')
	<i class="gi gi-envelope"></i> Mensajes 
@stop
@section('content_body_page')
	<div class="block full">
        <div class="table-responsive">
            <table id="example-datatable" class="table table-striped table-bordered table-vcenter">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th title="Nombre del Votante">Email</th>
                        <th>Teléfono</th>
                        <th>Texto</th>
                        <th title="Ultima actulaización del Votante">Fecha</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($messages as $message)
                        <tr>
                            <td>{{{ $message->name }}}</td>
                            <td><strong>{{{ $message->email }}}</strong></td>
                            <td>{{{ $message->tel }}}</td>
                            <td>{{{ $message->text }}}</td>
                            <td>{{{ $message->created_at_for_humans }}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $messages->links() }} 
        </div>
    </div>
@stop