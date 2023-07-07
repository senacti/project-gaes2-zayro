<!doctype html>
<html lang="es">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @include('partialsindex.head')
    @yield('head')

    @viteReactRefresh
    @vite(['resources/js/app.js'])
</head>

<body>
    <nav class="sidebar">
        @include('partialsindex.sidebar')
    </nav>

    <header>
        @include('partialsindex.header')
    </header>

    <div class="navtitle">
        <nav id="navbar-primary" class="navbar navbar-default" role="navigation">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbar-primary-collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="{{ url('/') }}" class="{{ request()->is('/') ? 'active' : '' }}">INICIO</a>
                        </li>
                        <li><a href="{{ url('/disfraces') }}"
                                class="{{ request()->is('disfraces') ? 'active' : '' }}">DISFRACES</a></li>
                        <li><a href="{{ url('/nosotros') }}"
                                class="{{ request()->is('nosotros') ? 'active' : '' }}">NOSOTROS</a></li>
                        <li><a href="{{ url('/dashboard') }}">DASHBOARD</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>


    <main>
        @yield('content')
    </main>


    <footer class="footer-distributed" id="footer-sect">
        @include('partialsindex.footer')
    </footer>
    {{-- <script>
        setTimeout(function() {
            $("#modal_trigger").click();
        }, 5000);
    </script> --}}
    {{-- @if (isset($redirect) && $redirect)
        <script>
            setTimeout(function() {
                $("#modal_trigger").click();
            }, 5000);
        </script>
    @endif --}}

    @include('partialsindex.scripts')
    @yield('scripts')
    <div class="overlay"></div>
</body>

</html>
