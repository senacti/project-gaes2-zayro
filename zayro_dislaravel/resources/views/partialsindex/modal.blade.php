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