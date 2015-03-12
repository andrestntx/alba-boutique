<header class="navbar navbar-inverse navbar-fixed-top">
    <!-- Left Header Navigation -->
    <ul class="nav navbar-nav-custom">
        <!-- Main Sidebar Toggle Button -->
        <li>
            <a href="javascript:void(0)" onclick="App.sidebar('toggle-sidebar');">
                <i class="fa fa-ellipsis-v fa-fw animation-fadeInRight" id="sidebar-toggle-mini"></i>
                <i class="fa fa-bars fa-fw animation-fadeInRight" id="sidebar-toggle-full"></i>
            </a>
        </li>
        <!-- END Main Sidebar Toggle Button -->
    </ul>
    <!-- END Left Header Navigation -->
    <!-- Right Header Navigation -->
    <ul class="nav navbar-nav-custom pull-right">
        <!-- Search Form -->
        <li>
            {{ Form::open(['route' => 'productos.buscar', 'method' => 'get', 'class' => 'navbar-form-custom']) }}
                {{ Form::text('id', null, ['class' => 'form-control', 'placeholder' => 'Buscar Referencia..']) }}
            {{ Form::close() }}
        </li>
        <!-- END Search Form -->

        <li>
          <strong class="hidden-xs" style="height: 50px; line-height: 50px; padding: 0 10px; margin: 0; font-weight: 200; font-size: 16px; color:white;">{{ Auth::user()->name }}</strong>  
        </li>
        

        <!-- Alternative Sidebar Toggle Button -->
        <li>
            <a href="javascript:void(0)" onclick="App.sidebar('toggle-sidebar-alt');">
                <i class="gi gi-settings"></i>
            </a>
        </li>
        <!-- END Alternative Sidebar Toggle Button -->

        <!-- User Dropdown -->
        <li class="dropdown">
            <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">
                <img src="{{ URL::to(Auth::user()->image) }}" alt="Menú de Usuario">
            </a>
            <ul class="dropdown-menu dropdown-menu-right">
                <li class="dropdown-header">
                    <strong>ADMINISTRADOR</strong>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-inbox fa-fw pull-right"></i>
                        Mensajes
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-pencil-square fa-fw pull-right"></i>
                        Mi Perfil
                    </a>
                </li>
                <li class="divider"><li>
                <li>
                    <a href="javascript:void(0)" onclick="App.sidebar('toggle-sidebar-alt');">
                        <i class="gi gi-settings fa-fw pull-right"></i>
                        Configuración
                    </a>
                </li>
                <li>
                    <a href="page_ready_lock_screen.html">
                        <i class="gi gi-lock fa-fw pull-right"></i>
                        Bloquear
                    </a>
                </li>
                <li>
                    <a href="{{url('logout')}}">
                        <i class="fa fa-power-off fa-fw pull-right"></i>
                        Cerrar sesión
                    </a>
                </li>
            </ul>
        </li>
        <!-- END User Dropdown -->
    </ul>
    <!-- END Right Header Navigation -->
</header>