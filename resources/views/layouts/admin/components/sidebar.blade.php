<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-menu">Menu</li>

                <li>
                    <a href="{{ route('welcome') }}" class="waves-effect">
                        <i class="bx bx-home-circle"></i><!--<span class="badge badge-pill badge-info float-right">03</span>-->
                        <span key="t-dashboards">Inicio</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                    </ul>
                </li>

                <li>
                    @if(Gate::check('Ver Tienda') or Gate::check('Ver Carrito'))
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="bx bx-store-alt"></i>
                            <span key="t-layouts">Bicicletas Bogotá</span>
                        </a>
                    @endif
                    <ul class="sub-menu" aria-expanded="false">
                        @can('Ver Tienda')
                            <li><a href="{{ route('stores.index') }}" key="t-horizontal">Tienda</a></li>
                        @endcan
                    </ul>

                </li>

                <li>
                    @if(Gate::check('Ver Pedidos') or Gate::check('Ver Facturas') or Gate::check('Ver Clientes'))
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="bx bx-receipt"></i>
                            <span key="t-layouts">Ventas</span>
                        </a>
                    @endif
                    <ul class="sub-menu" aria-expanded="false">
                        @can('Ver Clientes')
                            <li><a href="{{ route('customers.index') }}" key="t-horizontal">Clientes</a></li>
                        @endcan

                        @can('Ver Pedidos')
                            <li><a href="{{ route('providers.index') }}" key="t-horizontal">Pedidos</a></li>
                        @endcan

                        @can('Ver Facturas')
                            <li><a href="{{ route('invoices.index') }}" key="t-vertical">Facturas</a></li>
                        @endcan
                    </ul>

                </li>
                <li>
                    @if(Gate::check('Ver Proveedores') or Gate::check('Ver Entradas'))
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-face"></i>
                        <span key="t-layouts">Proveedores</span>
                    </a>
                    @endif
                    <ul class="sub-menu" aria-expanded="false">
                        @can('Ver Proveedores')
                        <li><a href="{{ route('providers.index') }}" key="t-horizontal">Proveedores</a></li>
                        @endcan

                        @can('Ver Entradas')
                            <li><a href="{{ route('entries.index') }}" key="t-vertical">Entradas</a></li>
                        @endcan
                    </ul>

                </li>

                <li>
                    @if(Gate::check('Ver Categorias') or Gate::check('Ver Productos') or Gate::check('Ver Bodegas'))

                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-store"></i>
                        <span key="t-layouts">Inventario</span>
                    </a>
                    @endif
                    <ul class="sub-menu" aria-expanded="false">
                        @can('Ver Categorias')
                        <li><a href="{{ route('categories.index') }}" key="t-horizontal">Categorias</a></li>
                        @endcan

                        @can('Ver Productos')
                        <li><a href="{{ route('products.index') }}" key="t-vertical">Productos</a></li>
                        @endcan

                        @can('Ver Bodegas')
                        <li><a href="{{ route('warehouses.index') }}" key="t-vertical">Bodegas</a></li>
                        @endcan
                    </ul>
                </li>
                <li>
                    @if(Gate::check('Ver Usuarios'))

                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-layout"></i>
                        <span key="t-layouts">Opciones</span>
                    </a>
                    @endif
                    @can('Ver Usuarios') <!--nos permite validar si el rol del usuario tiene acceso a la ruta-->
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{ route('users.index') }}" key="t-horizontal">Usuarios</a></li>
                        </ul>
                    @endcan

                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
