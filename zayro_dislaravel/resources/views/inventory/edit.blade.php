@extends('layouts.app')

@section('head')
    <title>Editar producto - Zayro Disfraces</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard/inventory.css') }}">
@endsection

@section('page-title', 'Editar Producto')

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
                    <h3 class="heading">Edit a product</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('inventory.update', ['id' => $product->id]) }}" method="post">
                        @method('PUT')
                        @csrf
                        <input type="hidden" name="id" value="{{ $product->id }}">
                        <input type="text" name="name" placeholder="Product name" value="{{ $product->name }}">
                        <input type="number" name="price" placeholder="Product price" value="{{ $product->price }}">
                        <select name="category">
                            <option value="ninos" {{ $product->category == 'ninos' ? 'selected' : '' }}>Niños</option>
                            <option value="hombre" {{ $product->category == 'hombre' ? 'selected' : '' }}>Hombre</option>
                            <option value="mujer" {{ $product->category == 'mujer' ? 'selected' : '' }}>Mujer</option>
                            <option value="eventos" {{ $product->category == 'eventos' ? 'selected' : '' }}>Eventos</option>
                        </select>
                        <input type="text" name="image_url" placeholder="Product image URL"
                            value="{{ $product->image_url }}">
                        <input type="submit" value="Update">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
