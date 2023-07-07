<div class="sidebar">
    <div class="sidebar-brand">
        <h2><span><i class="fas fa-mask"></i></span><span class="sidebar-title" id="kleenpulse">Zayro System</span></h2>
    </div>
    <div class="sidebar-menu">
        <ul>
            <li>
                <a href="{{ url('/dashboard') }}" class="{{ Request::is('dashboard') ? 'active' : '' }}">
                    <span class="fas fa-cubes"></span>
                    <span>Panel de control</span>
                </a>
            </li>
            {{-- <li>
                <a href="{{ url('/usuarios') }}" class="{{ Request::is('usuarios*') ? 'active' : '' }}">
                    <span class="fas fa-users"></span>
                    <span>Usuarios</span>
                </a>
            </li> --}}
            <li>
                <a href="{{ url('/reporte') }}" class="{{ Request::is('reporte*') ? 'active' : '' }}">
                    <span class="fas fa-clipboard-list"></span>
                    <span>Reportes</span>
                </a>
            </li>
            {{-- <li>
                <a href="{{ url('/pedidos') }}" class="{{ Request::is('pedidos*') ? 'active' : '' }}">
                    <span class="fas fa-shopping-bag"></span>
                    <span>Pedidos</span>
                </a>
            </li> --}}
            <li>
                <a href="{{ url('/productos') }}" class="{{ Request::is('productos*') ? 'active' : '' }}">
                    <span class="fas fa-table"></span>
                    <span>Productos</span>
                </a>
            </li>
            <li>
                <a href="{{ url('/marketing') }}" class="{{ Request::is('marketing*') ? 'active' : '' }}">
                    <span class="fas fa-calendar-plus"></span>
                    <span>Marketing</span>
                </a>
            </li>
            <li>
                <a href="{{ url('/factura') }}" class="{{ Request::is('factura*') ? 'active' : '' }}">
                    <span class="fas fa-receipt"></span>
                    <span>Facturación</span>
                </a>
            </li>
            <li>
                <a href="{{ url('/carrito') }}" class="{{ Request::is('carrito*') ? 'active' : '' }}">
                    <span class="fas fa-shopping-cart"></span>
                    <span>Carrito</span>
                </a>
            </li>
            <li>
                <a href="{{ url('/') }}" class="{{ Request::is('/') ? 'active' : '' }}">
                    <span class="fas fa-house-user"></span>
                    <span>Inicio</span>
                </a>
            </li>
            <li>
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();"
                >
                    <span class="fas fa-sign-out-alt"></span>
                    <span>{{ __('Salir') }}</span>
                </a>
            </li>
        </ul>
    </div>
</div>
