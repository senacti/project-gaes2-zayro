<div class="nav-header">
    <div class="logo-wrap">
        <a class="logo-icon" href="#"><img alt="logo-icon" src="{{ asset('img/logo1.png') }}" width="40" /></a>
        <a class="logo-text" href="{{ url('/') }}">ZAYRO <span class="subtitle">DISFRACES</span></a>
    </div>

    <div class="nav-search">
        <div class="search">
            <i class="material-icons">search</i>
            <input type="search" name="search" placeholder="Buscar" />
        </div>
    </div>
</div>
<ul class="nav-categories ul-base">
    <li>
        <a href="{{ url('/') }}" class="{{ request()->is('/') ? 'active' : '' }}">Inicio</a>
    </li>
    <li><a href="{{ url('/disfraces') }}" class="{{ request()->is('disfraces') ? 'active' : '' }}">Disfraces</a></li>
    <li><a href="{{ url('/nosotros')}}" class="{{ request()->is('nosotros') ? 'active' : '' }}">Nosotros</a></li>
    <li><a href="{{ url('/dashboard') }}">Dashboard</a></li>
</ul>
<ul class="social ul-base">
    <li>
        <a href="#" class="twitter" target="_blank"><i class="fa fa-twitter"></i></a>
    </li>
    <li>
        <a href="#" class="facebook" target="_blank"><i class="fa fa-facebook"></i></a>
    </li>
    <li>
        <a href="#" class="instagram" target="_blank"><i class="fa fa-instagram"></i></a>
    </li>
    <li>
        <a href="#" class="whatsapp" target="_blank"><i class="fa fa-whatsapp"></i></a>
    </li>
</ul>
<div class="copyright">
    <span>&copy; 2023 - Zayro System</span>
</div>
