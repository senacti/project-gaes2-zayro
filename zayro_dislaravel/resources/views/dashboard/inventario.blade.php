@extends('layouts.app')

@section('head')
    <title>Inventario - Zayro Disfraces</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard/inventario.css') }}">
@endsection

@section('page-title', 'Inventario')

@section('content')
    <div class="switch" id="switch">
        <div id="toggle">
        </div>
    </div>
    <div class="cards">
        <div class="card-single">
            <div>
                <h1 id="customer"></h1>
                <span>Nuevos clientes</span>
            </div>
            <div>
                <span class="fas fa-users"></span>
            </div>
        </div>
        <div class="card-single">
            <div>
                <h1 id="project"></h1>
                <span>Nuevos productos</span>
            </div>
            <div>
                <span class="fas fa-clipboard"></span>
            </div>
        </div>
        <div class="card-single">
            <div>
                <h1 id="order"></h1>
                <span>Interacciones en la base de datos</span>
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
                <span>Registros sin guardar</span>
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
                    <h3 class="heading">Inventario Productos</h3>
                </div>
                <div class="card-body">
                    <div id='app'>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

@section('scripts')
    <script src='https://cdnjs.cloudflare.com/ajax/libs/react/15.6.1/react.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/react/15.6.1/react-dom.min.js'></script>
    <script src="{{ asset('js/dashboard/inventario.js') }}"></script>
@endsection
