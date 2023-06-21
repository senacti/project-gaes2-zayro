<div class="sidebar">
    <div class="sidebar-brand">
        <h2><span><i class="fas fa-mask"></i></span><span id="kleenpulse">Zayro System</span></h2>
    </div>
    <div class="sidebar-menu">
        <ul>
            <li>
                <a href="{{ url('/dashboard') }}" class="{{ request()->is('dashboard') ? 'active' : '' }}"><span
                        class="fas fa-cubes"></span>
                    <span>Panel de control</span>
                </a>
            </li>
            <li>
                <a href="#" class="{{ request()->is('clientes') ? 'active' : '' }}"><span
                        class="fas fa-users"></span>
                    <span>Clientes</span>
                </a>
            </li>
            <li>
                <a href="{{ url('/informes') }}" class="{{ request()->is('informes') ? 'active' : '' }}"><span
                        class="fas fa-clipboard-list"></span>
                    <span>Informes</span>
                </a>
            </li>
            <li>
                <a href="#" class="{{ request()->is('pedidos') ? 'active' : '' }}"><span
                        class="fas fa-shopping-bag"></span>
                    <span>Pedidos</span>
                </a>
            </li>
            <li>
                <a href="{{ url('/inventario') }}" class="{{ request()->is('inventario') ? 'active' : '' }}"><span
                        class="fas fa-table"></span>
                    <span>Inventario</span>
                </a>
            </li>
            <li>
                <a href="{{ url('/factura') }}" class="{{ request()->is('factura') ? 'active' : '' }}"><span
                        class="fas fa-receipt"></span>
                    <span>Facturación</span>
                </a>
            </li>
            <li>
                <a href="#" class="{{ request()->is('vendedores') ? 'active' : '' }}"><span
                        class="fa fa-user-circle"></span>
                    <span>Vendedores</span>
                </a>
            </li>
            <li>
                <a href="#" class="{{ request()->is('marketing') ? 'active' : '' }}"><span
                        class="fas fa-calendar-plus"></span>
                    <span>Marketing</span>
                </a>
            </li>
            <li>
                <a href="{{ url('/carrito') }}"><span class="fas fa-shopping-cart"></span>
                    <span>Carrito</span>
                </a>
            </li>
            <li>
                <a href="{{ url('/') }}"><span class="fas fa-house-user"></span>
                    <span>Página de inicio</span>
                </a>
            </li>
            <li>
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                document.getElementById('logout-form').submit();"><span
                        class="fas fa-sign-out-alt"></span>
                    <span>{{ __('Salir') }}</span>
                </a>
            </li>
        </ul>
    </div>
</div>
