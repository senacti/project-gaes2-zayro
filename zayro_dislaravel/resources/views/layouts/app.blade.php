<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @include('partials.head')
    
    @yield('head')

    @viteReactRefresh
    @vite(['resources/js/app.js'])
</head>

<body>

    <div class="main-wrapper">
        <input type="checkbox" id="nav-toggle">
        @include('partials.sidebar')
        <header>
            <label for="nav-toggle">
                <span class="fas fa-bars"></span>
            </label>
            <img class="header-logo" src="{{ asset('img/logo2.png') }}" alt="logo zayro disfraces">
            <h2 class="heading" id="dashboard">
                @yield('page-title')
            </h2>

            <div class="search">
                <div class="search-rotate">
                    <div class="icon"></div>
                </div>
                <div class="input">
                    <input type="text" placeholder="Buscar" id="mysearch" autocomplete="off"
                        onkeydown="display(this)">
                </div>
            </div>

            <div class="collapse navbar-collapse user-wrapper" id="navbarSupportedContent">

                <ul class="navbar-nav ms-auto">
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link logre" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link logre" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li>
                            <h3 href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false" v-pre>
                                {{ Auth::user()->NOMBRE }}
                            </h3>

                            <div aria-labelledby="navbarDropdown">
                                <h4 class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                                    {{ __('Salir') }}
                                </h4>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </header>

        <main>
            <div class="cards">
                @yield('cards')
            </div>
            <div class="recent-grid">
                <div class="projects">
                    <div class="card">
                        @yield('content')
                    </div>
                </div>
            </div>
        </main>

        <footer class="footer">
            <p>Zayro System © 2023</p>
        </footer>
    </div>

    @yield('scripts')
    <script src="{{ asset('js/dashboard/app.js') }}"></script>
</body>

</html>