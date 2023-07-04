@extends('layouts.app')

@section('head')
    <title>Crear producto - Zayro Disfraces</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard/inventory.css') }}">
@endsection

@section('page-title', 'Crear Producto')

@section('content')
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
                    <h3 class="heading">Crear nuevo producto</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('inventory')  }}"method="POST">
                        @method('PUT')
                        @csrf
                        <input type="text" name="name" placeholder="Product name">
                        <input type="number" name="price" placeholder="Product price">
                        <select name="category">
                            <option value="ninos">Niños</option>
                            <option value="hombre">Hombre</option>
                            <option value="mujer">Mujer</option>
                            <option value="eventos">Eventos</option>
                        </select>
                        <input type="text" name="image_url" placeholder="Product image URL">
                        <input type="submit" value="Create">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
