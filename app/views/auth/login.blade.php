@extends ('auth.layout')
    @section('title_auth')
        <h1 class="h2 text-light text-center push-top-bottom animation-slideDown">
            <i class="fa fa-heart"></i> <strong>Alba Boutique</strong>
        </h1>
    @stop

    @section('buttons_header')
        <a href="{{url('/')}}" class="btn btn-effect-ripple btn-primary" data-toggle="tooltip" data-placement="left" title="Olvidaste tu contraseña?"><i class="fa fa-exclamation-circle"></i></a>
    @stop

    @section('title_header')
        <h2>Iniciar Sesión</h2>
    @stop
    
    @section('form_auth')
        {{ Form::open(array('route' => 'login', 'method' => 'POST', 'class' => 'form-horizontal', 'id' => 'form-login')) }}
            <div class="form-group">
                <div class="col-xs-12">
                    <input type="text" id="username" name="username" class="form-control" placeholder="Usuario..">
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-12">
                    <input type="password" id="password" name="password" class="form-control" placeholder="Contraseña..">
                </div>
            </div>
            <div class="form-group form-actions">
                <div class="col-xs-8">
                    <label class="csscheckbox csscheckbox-primary">
                        <input type="checkbox" id="login-remember-me" name="remember" value="true">
                        <span></span>
                    </label>
                    Recordarme
                </div>
                <div class="col-xs-4 text-right">
                    <button type="submit" class="btn btn-effect-ripple btn-sm btn-primary"><i class="fa fa-check"></i> Iniciar</button>
                </div>
            </div>
        {{Form::close()}}
    @stop