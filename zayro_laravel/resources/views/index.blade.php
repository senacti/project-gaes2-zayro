<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <title>
        Inicio | Zayro Disfraces
    </title>
    <link rel="icon" type="image/png" href="{{ asset('img/logo2.png') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lemonada:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">
</head>

<body>

    <nav class="sidebar">
        <div class="nav-header">
            <div class="logo-wrap">
                <a class="logo-icon" href="#"><img alt="logo-icon" src="{{ asset('img/logo1.png') }}"
                        width="40" /></a>
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
                <a href="#">Inicio</a>
            </li>
            <li><a href="#">Disfraces</a></li>
            <li><a href="#">Eventos</a></li>
            <li><a href="#">Zayro</a></li>
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
    </nav>

    <header>
        <div class="header-inner clearfix">

            <div class="nav-btn nav-slider">
                <i class="material-icons" id="menu">menu</i>
            </div>

            <div class="header-login">
                <button class="login"><a class="sign" id="modal_trigger" href="#modal">INICIA SESION</a></button>
            </div>
            <div id="modal" class="popupContainer" style="display:none;">
                <header class="popupHeader">
                    <center><span class="header_title">Iniciar Sesión</span></center>
                    <span class="modal_close"><i class="fa fa-times"></i></span>
                </header>
                <section class="popupBody">

                    <div class="social_login">
                        <div class="">
                            <a href="#" class="social_box fb">
                                <span class="icon"><i class="fa fa-facebook"></i></span>
                                <span class="icon_title">Conectar con Facebook</span>

                            </a>

                            <a href="#" class="social_box google">
                                <span class="icon"><i class="fa fa-google-plus"></i></span>
                                <span class="icon_title">Conectar con Google</span>
                            </a>
                        </div>

                        <div class="centeredText">
                            <span>O usa tu correo electrónico</span>
                        </div>

                        <div class="action_btns">
                            <div class="one_half"><a href="#" id="login_form" class="btn">Iniciar</a></div>
                            <div class="one_half last"><a href="#" id="register_form"
                                    class="btn">Registrar</a></div>
                        </div>
                    </div>


                    <div class="user_login">
                        <form id="login-form" method="POST" action="{{ route('login') }}">
                            @csrf
                            <div>
                                <label for="email">Correo Electrónico</label>
                                <input type="email" id="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email" autofocus />

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div>
                                <label for="password">Contraseña</label>
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="current-password" />
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="checkbox">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                        {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Recuerdame') }}
                                    </label>
                                </div>
                            </div>

                            <div class="action_btns">
                                <div class="one_half"><a href="#" class="btn back_btn"><i
                                            class="fa fa-angle-double-left"></i> Volver</a>
                                </div>
                                <div class="one_half last">
                                    <button type="submit" class="btn btn_red">
                                        {{ __('Iniciar') }}
                                    </button>
                                </div>

                                @if (Route::has('password.request'))
                                    <a class="forgot_password" href="{{ route('password.request') }}">
                                        {{ __('¿Olvidaste tu contraseña?') }}
                                    </a>
                                @endif
                            </div>
                        </form>
                    </div>

                    <div class="user_register">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div>
                                <label for="name">{{ __('Nombre completo') }}</label>

                                <div>
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div>
                                <label for="email">{{ __('Correo Electrónico') }}</label>

                                <div>
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div>
                                <label for="password">{{ __('Contraseña') }}</label>

                                <div>
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div>
                                <label for="password-confirm">{{ __('Confirmar Contraseña') }}</label>

                                <div>
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
                            
                            <br>

                            <div class="action_btns">
                                <div class="one_half"><a href="#" class="btn back_btn"><i
                                            class="fa fa-angle-double-left"></i> Volver</a></div>
                                <div class="one_half last">
                                    <button type="submit" class="btn btn_red">
                                        {{ __('Registrarse') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </section>
            </div>
            <div class="header-menu">
                <h2 id="title" onclick="location.href={{ url('/') }}">ZAYRO <span
                        class="subtitle">DISFRACES</span></h2>
            </div>

            <div class="header-search">
                <div class="search">
                    <i class="material-icons"><img src="{{ asset('img/busqueda.png') }}" id="search_img"
                            onClick="location.href='/500'"></i>
                    <input type="search" id="searchh" name="search" placeholder="Buscar" />
                </div>
            </div>
        </div>
    </header>

    <div class="navtitle">
        <nav id="navbar-primary" class="navbar navbar-default" role="navigation">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbar-primary-collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="#" class="active">INICIO</a></li>
                        <li><a href="#disfraces-tab">DISFRACES</a></li>
                        <li><a href="#">EVENTOS</a></li>
                        <li><a href="#">ZAYRO</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>


    <ul class="bxslider">
        <li class="slide-item"><img src="{{ asset('img/primera.webp') }}" alt="" />
        </li>
        <li class="slide-item"><img src="{{ asset('img/segunda.webp') }}" alt="" />
        </li>
        <li class="slide-item"><img src="{{ asset('img/tercera.webp') }}" alt="" />
        </li>
    </ul>


    <hr class="hr-text" data-content="¡No busques más!">
    <div id="app" class="container">
        <card data-image="{{ asset('img/carrusel2.webp') }}" onClick="location.href='/404'">
            <h1 slot="header">DISFRACES PARA CABALLERO</h1>
        </card>
        <card data-image="{{ asset('img/carrusel6.webp') }}" onClick="location.href='/404'">
            <h1 slot="header">DISFRACES PARA DAMA</h1>
        </card>
        <card data-image="{{ asset('img/carrusel1.webp') }}" onClick="location.href='/404'">
            <h1 slot="header">DISFRACES PARA EVENTOS</h1>
        </card>
        <card data-image="{{ asset('img/ninos.webp') }}" onClick="location.href='/404'">
            <h1 slot="header">DISFRACES PARA NIÑOS</h1>
        </card>
    </div>

    <div class="info">
        <hr class="hr-text2" data-content="¡Estás en el lugar correcto!">
        <div id="info-div" class="info-div">
            <div class="container-info">
                <div class="collapse info-collapse" id="info-primary-collapse">
                    <ul class="nav info-nav">
                        <li><span class="material-symbols-outlined">
                                workspace_premium
                            </span> PRECIOS ACCESIBLES </li>
                        <li><span class="material-symbols-outlined">
                                workspace_premium
                            </span> GRAN VARIEDAD DE DISEÑOS </li>
                        <li><span class="material-symbols-outlined">
                                workspace_premium
                            </span> ACCESORIOS INCLUIDOS </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <hr id="disfraces-tab" class="hr-text3" data-content="Disfraces populares y de alta demanda">
    <div id="root"></div>

    <footer class="footer-distributed">

        <div class="footer-left">

            <h3>Zayro<span class="subtitle"> Disfraces</span></h3>

            <p class="footer-links">
                <a href="#">Inicio</a>
                ·
                <a href="#">Productos</a>
                ·
                <a href="#">Sobre Nosotros</a>
                ·
                <a href="#">Eventos</a>
                ·
                <a href="#">Contacto</a>
            </p>

            <p class="footer-company-name">Zayro Disfraces © 2023</p>

            <div class="footer-icons">

                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-whatsapp"></i></a>
                <a href="#"><i class="fa fa-instagram"></i></a>
            </div>

        </div>

        <div class="footer-right">

            <p>¿Tienes unos minutos para darnos <span class="subtitle">tu opinión</span>?</p>

            <form>
                <input type="text" name="Username" placeholder="Nombre" required />
                <input type="email" name="email" placeholder="Correo" required />
                <textarea name="message" placeholder="Mensaje" required></textarea>
                <input type="submit" class="btn btn_red" value="Enviar" />
            </form>

        </div>

    </footer>

    <div class="overlay"></div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.0.1/vue.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://leanmodal.finelysliced.com.au/js/jquery.leanModal.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/react/16.7.0-alpha.2/umd/react.production.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/react-dom/16.7.0-alpha.2/umd/react-dom.production.min.js"></script>
    <script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>
    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>
