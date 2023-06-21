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
    <input type="checkbox" id="nav-toggle">

    @include('partials.sidebar')
    <div class="main-wrapper">
        <div class="main-content">
            <header>
                <img src="{{ asset('img/logo2.png') }}" alt="logo zayro disfraces" width="80px"
                    style="background-color:white; border-radius: 20px; margin-left: 50px;">
                <h2 class="heading" id="dashboard">
                    @yield('page-title')
                </h2>
                <label for="nav-toggle">
                    <span class="fas fa-bars"></span>
                </label>

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
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                                        {{ __('Salir') }}
                                    </a>

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
                @yield('content')
            </main>

            <div class="footer">
                <div class="word">
                    <p>Zayro System © 2023</p>
                </div>
            </div>
        </div>
    </div>

    @yield('scripts')
    <script src="{{ asset('js/dashboard/app.js') }}"></script>
</body>

</html>
