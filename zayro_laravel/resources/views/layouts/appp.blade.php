<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Panel de control - Zayro Disfraces</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer">
    <link rel="icon" type="image/png" href="{{ asset('img/logo2.png') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    @yield('head')
    <!-- Scripts -->
    @viteReactRefresh
    @vite(['resources/js/app.js'])
</head>

<body>
    <input type="checkbox" id="nav-toggle">

    <div class="sidebar">
        <div class="sidebar-brand">
            <h2><span><i class="fas fa-mask"></i></span><span id="kleenpulse">Zayro System</span></h2>
        </div>
        <div class="sidebar-menu">
            @yield('sidebar')
        </div>
    </div>
    <div class="main-wrapper">
        <div class="main-content">
            <header>
                <img src="{{ asset('img/logo2.png') }}" alt="logo zayro disfraces" width="80px"
                    style="background-color:white; border-radius: 20px; margin-left: 50px;">
                <h2 class="heading" id="dashboard">
                    Panel de control
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
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <img src="{{ asset('img/logo1.png') }}" alt="logo zayro system">
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
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
                                        {{ __('Logout') }}
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

    <script src="{{ asset('js/dashboard.js') }}"></script>
    @yield('scripts')
</body>

</html>
