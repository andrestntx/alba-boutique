<div id="sidebar">
    <!-- Sidebar Brand -->
    <div id="sidebar-brand" class="themed-background">
        <a href="{{url('/')}}" class="sidebar-title">
            <i class="fa fa-heart"></i> 
            <span class="sidebar-nav-mini-hide">Alba Boutique</span>
        </a>
    </div>
    <!-- END Sidebar Brand -->

    <!-- Wrapper for scrolling functionality -->
    <div id="sidebar-scroll">
        <!-- Sidebar Content -->
        <div class="sidebar-content">
            <!-- Sidebar Navigation -->
            <ul class="sidebar-nav">
                <li>
                    <a href="#" class="sidebar-nav-menu"><span class="sidebar-nav-ripple animate" style="height: 220px; width: 220px; top: -85px; left: 48px;"></span><i class="fa fa-chevron-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="fa fa-cc-mastercard sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Productos</span></a>
                    <ul>
                        @foreach($categoriesMenu as $category)
                            <li>
                                <a href="{{route('admin.categorias.productos.index', $category->id)}}">{{$category->name}}</a>
                            </li>
                        @endforeach
                    </ul>
                </li>
                <li>
                    <a href="{{url('admin/categorias')}}">
                        <i class="gi gi-fins sidebar-nav-icon"></i>
                        <span class="sidebar-nav-mini-hide">Categorías</span>
                    </a>
                </li>
                <li>
                    <a href="{{url('admin/mensajes')}}">
                        <i class="gi gi-envelope sidebar-nav-icon"></i>
                        <span class="sidebar-nav-mini-hide">Mensajes</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="sidebar-nav-menu"><span class="sidebar-nav-ripple animate" style="height: 220px; width: 220px; top: -85px; left: 48px;"></span><i class="fa fa-chevron-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="fa fa-file-photo-o sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Imagenes</span></a>
                    <ul>
                        <li>
                            <a href="{{URL::to('admin/imagenes/precios-detal')}}">Precios al detal</a>
                        </li>
                        <li>
                            <a href="{{URL::to('admin/imagenes/precios-por-mayor')}}">Precios por mayor</a>
                        </li>
                        <li>
                            <a href="{{URL::to('admin/imagenes/todos-los-precios')}}">Todos los precios</a>
                        </li>
                        <li>
                            <a href="{{URL::to('admin/imagenes/actualizar')}}">Actualizar</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- END Sidebar Navigation -->
        </div>
        <!-- END Sidebar Content -->
    </div>
    <!-- END Wrapper for scrolling functionality -->

    <!-- Sidebar Extra Info -->
    <div id="sidebar-extra-info" class="sidebar-content sidebar-nav-mini-hide" style="margin-bottom:10px;">
    </div>
    <!-- END Sidebar Extra Info -->
</div>