@extends('layouts.main')

@section('head')
    <title>Inicio - Zayro Disfraces</title>
    <link rel="stylesheet" href="{{ asset('css/inicio/style.css') }}">
@endsection

@section('content')
    <ul class="bxslider">
        <li class="slide-item"><img src="{{ asset('https://ik.imagekit.io/Bc/primera.webp') }}"
                alt="Descubre el personaje que llevas dentro con zayro disfraces" loading="lazy" />
        </li>
        <li class="slide-item"><img src="{{ asset('https://ik.imagekit.io/Bc/segunda.webp') }}"
                alt="En nuestra temporada de Halloween, aprovecha nuestros descuentos" loading="lazy" />
        </li>
        <li class="slide-item"><img src="{{ asset('https://ik.imagekit.io/Bc/tercera.webp') }}"
                alt="Es hora de festejar, salir y celebrar con zayro todo el año es carnaval" loading="lazy" />
        </li>
    </ul>


    <hr class="hr-text" data-content="¡No busques más!">
    <div id="app" class="container">
        <card data-image="{{ asset('https://ik.imagekit.io/Bc/carrusel2.webp') }}" onClick="location.href='/404'">
            <h1 slot="header">DISFRACES PARA CABALLERO</h1>
        </card>
        <card data-image="{{ asset('https://ik.imagekit.io/Bc/carrusel6.webp') }}" onClick="location.href='/404'">
            <h1 slot="header">DISFRACES PARA DAMA</h1>
        </card>
        <card data-image="{{ asset('https://ik.imagekit.io/Bc/carrusel1.webp') }}" onClick="location.href='/404'">
            <h1 slot="header">DISFRACES PARA EVENTOS</h1>
        </card>
        <card data-image="{{ asset('https://ik.imagekit.io/Bc/ninos.webp') }}" onClick="location.href='/404'">
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
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.0.1/vue.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/react/16.7.0-alpha.2/umd/react.production.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/react-dom/16.7.0-alpha.2/umd/react-dom.production.min.js"></script>
    <script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>
    <script type="module" src="{{ asset('js/inicio/main.js') }}"></script>
@endsection
