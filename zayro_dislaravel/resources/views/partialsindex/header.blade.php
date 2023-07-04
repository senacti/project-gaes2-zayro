<div class="header-inner clearfix">

    <div class="nav-btn nav-slider">
        <i class="material-icons" id="menu">menu</i>
    </div>

    <div class="header-login" id="navbarSupportedContent">

        <ul class="navbar-nav me-auto">

        </ul>


        <ul class="navbar-nav ms-auto">

            @guest
                <button class="login"><a class="sign" id="modal_trigger" href="#modal">INICIA
                        SESION</a></button>
            @else
                <a id="navbarDropdown" class="nav-link dropdown-toggle subtitle" href="#" role="button"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->NOMBRE }}
                </a>

                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    {{-- <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                        {{ __('Salir') }}
                    </a> --}}

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                        <button type="submit">Salir</button>
                    </form>
                </div>

            @endguest
        </ul>
    </div>

    <div id="modal" class="popupContainer" style="display:none;">
        @include('partialsindex.modal')
    </div>

    <div class="header-menu">
        <h2 id="title" onclick="location.href='/'">ZAYRO <span class="subtitle">DISFRACES</span>
        </h2>
    </div>

    @include('partialsindex.carrito')

    <div class="header-search">
        <div class="search">
            <i class="material-icons"><img src="{{ asset('img/busqueda.png') }}" id="search_img"
                    onClick="location.href='/500'"></i>
            <input type="search" id="searchh" name="search" placeholder="Buscar" />
        </div>
    </div>
</div>
