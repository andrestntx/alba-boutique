<div class="sidebar-section">
    <h2 class="text-light">Mi Perfil</h2>
    {{Form::open(array('route' => array('usuarios.update-profile', Auth::user()->id), 'method' => 'POST', 'class' => 'form-control-borderless'))}}
        {{Form::input('hidden', 'username', Auth::user()->username)}}
        <div class="form-group">
            <label for="side-profile-name">Nombre</label>
            <input type="text" id="side-profile-name" name="name" class="form-control" value="{{Auth::user()->name}}" required>
        </div>
        <div class="form-group">
            <label for="side-profile-email">Correo electrónico</label>
            <input type="email" id="side-profile-email" name="email" class="form-control" value="{{Auth::user()->email}}" required>
        </div>
        <div class="form-group">
            <label for="side-profile-password">Nueva contraseña</label>
            <input type="password" id="side-profile-password" name="password" class="form-control">
        </div>
        <div class="form-group">
            <label for="side-profile-password-confirm">Confirmar nueva contraseña</label>
            <input type="password" id="side-profile-password-confirm" name="password-confirm" class="form-control">
        </div>
        <div class="form-group remove-margin">
            <button type="submit" class="btn btn-effect-ripple btn-primary" onclick="App.sidebar('close-sidebar-alt');">Actualizar</button>
        </div>
    {{Form::close()}}
</div>