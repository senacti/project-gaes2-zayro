@extends('layouts.app')

@section('head')
    <title>Informes - Zayro Disfraces</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard/informes.css') }}">
@endsection

@section('content')
    <div class="switch" id="switch">
        <div id="toggle">
        </div>
    </div>
    <div class="cards">
        <div class="card-single">
            <div>
                <h1 id="customer"></h1>
                <span>Disfraces sin enviar</span>
            </div>
            <div>
                <span class="fas fa-users"></span>
            </div>
        </div>
        <div class="card-single">
            <div>
                <h1 id="project"></h1>
                <span>Vistas en anuncios</span>
            </div>
            <div>
                <span class="fas fa-clipboard"></span>
            </div>
        </div>
        <div class="card-single">
            <div>
                <h1 id="order"></h1>
                <span>Facturas en la semana</span>
            </div>
            <div>
                <span class="fas fa-shopping-bag"></span>
            </div>
        </div>
        <div class="card-single">
            <div>
                <h1>
                    <p id="income"></p>
                </h1>
                <span>Ventas online</span>
            </div>
            <div>
                <span class="fas fa-theater-masks"></span>
            </div>
        </div>
    </div>
    <div class="recent-grid">
        <div class="projects">
            <div class="card">
                <div class="card-header">
                    <h3 class="heading">Informes por barras</h3>
                </div>
                <div class="card-body">
                    <div id="highchart_container" style="width: 100%; max-width: 800px; margin: 0 auto">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/dashboard/informes.js') }}"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
@endsection
