<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

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
                        <li><a href="#" class="active">INICIO</a></li>
                        <li><a href="#disfraces-tab">DISFRACES</a></li>
                        <li><a href="#footer-sect">ZAYRO</a></li>
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

    @include('partialsindex.scripts')
    @yield('scripts')
</body>

</html>
