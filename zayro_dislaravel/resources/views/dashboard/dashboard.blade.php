@extends('layouts.app')

@section('head')
    <title>Panel de control - Zayro Disfraces</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard/dashboard.css') }}">
@endsection

@section('page-title', 'Panel de Control')

@section('cards')
    <div class="card-single">
        <div>
            <h1 id="customer">{{ $productoCount }}</h1>
            <span>Productos en total</span>
        </div>
        <div>
            <span class="fas fa-users"></span>
        </div>
    </div>
    <div class="card-single">
        <div>
            <h1 id="project">{{ $usuarioCount }}</h1>
            <span>Usuarios en total</span>
        </div>
        <div>
            <span class="fas fa-clipboard"></span>
        </div>
    </div>
    <div class="card-single">
        <div>
            <h1 id="order">{{ $ordenCount }}</h1>
            <span>Ordenes en total</span>
        </div>
        <div>
            <span class="fas fa-shopping-bag"></span>
        </div>
    </div>
    <div class="card-single">
        <div>
            <h1>
                <p id="income">{{ $activeCampaña }}</p>
            </h1>
            <span>Campaña activa</span>
        </div>
        <div>
            <span class="fas fa-theater-masks"></span>
        </div>
    </div>
@endsection

@section('content')
    <div class="card-header">
        <h3 class="heading">Últimas ordenes</h3>
        <button>Ver todos <span class="fas fa-arrow-right"></span></button>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table width="100%">
                <thead>
                    <tr>
                        <td>ID de la orden</td>
                        <td>Método de pago</td>
                        <td>Precio total</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ordenes as $orden)
                    <tr>
                        <td>{{ $orden->ID_ORDEN }}</td>
                        <td>{{ $orden->METODO_PAGO }}</td>
                        <td>${{ $orden->PRECIO_TOTAL }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="customers">
        <div class="card">
            <div class="card-header">
                <h3 class="heading">Nuevos clientes</h3>
                <button>Ver todos<span class="fas fa-arrow-right"></span></button>
            </div>
    
            <div class="card-body">
                @foreach ($usuarios as $usuario)
                    <div class="customer">
                        <div class="info">
                            <img src="{{ asset('img/user-solid.svg') }}" alt="usuario">
                            <div>
                                <h4>{{ $usuario->NOMBRE }}</h4>
                                <small>{{ $usuario->FECHA_NACIMIENTO }}</small>
                            </div>
                        </div>
                        <div class="contact">
                            <span class="fas fa-user-circle"></span>
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    
@endsection
