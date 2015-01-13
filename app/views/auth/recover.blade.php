@extends ('auth.layout')
    @section('title_page')
        Recuperar Contraseña
    @stop
    @section('title_auth')
        <i class="fa fa-cube"></i> <strong>Recuperar Contraseña</strong>
    @stop

    @section('buttons_header')
        <a href="{{url('login')}}" class="btn btn-effect-ripple btn-primary" data-toggle="tooltip" data-placement="left" title="Volver al Inicio de Sesión"><i class="fa fa-user"></i></a>
    @stop
    @section('title_header')
        <h2>Recuerar Contraseña</h2>
    @stop
    @section('form_auth')
        <form id="form-reminder" action="page_ready_reminder.html" method="post" class="form-horizontal">
            <div class="form-group">
                <div class="col-xs-12">
                    <input type="text" id="reminder-email" name="reminder-email" class="form-control" placeholder="Ingresa tu email..">
                </div>
            </div>
            <div class="form-group form-actions">
                <div class="col-xs-12 text-right">
                    <button type="submit" class="btn btn-effect-ripple btn-sm btn-primary"><i class="fa fa-check"></i> Enviar</button>
                </div>
            </div>
        </form>
    @stop
    </div>
@stop

#F58634