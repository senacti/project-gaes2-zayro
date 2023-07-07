@extends('layouts.main')

@section('head')
    <title>404 Error - Zayro Disfraces</title>
    <link rel="stylesheet" href="{{ asset('css/404.css') }}">
@endsection

@section('content')
    <div class="error-page">
        <div class="error-head">
            <meta class="error-meta"></meta>
            <meta class="error-meta"></meta>
            <meta class="error-meta"></meta>
        </div>
        <div class="error-body">
            <h1>Oops no fue posible encontrar la página que buscas, disfruta de la compañía por ahora...</h1>
            <a href="javascript:setTimeout(()=>{window. location = '/' },500);l">
                <button class="bubbly-button">Volver al Inicio</button>
            </a>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/404.js') }}"></script>
@endsection
