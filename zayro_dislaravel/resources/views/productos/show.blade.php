@extends('layouts.app')

@section('head')
    <title>Detalles {{ $producto->NOMBRE_DISFRAZ }} - Zayro Disfraces</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard/inventory.css') }}">
@endsection

@section('page-title', 'Detalles Producto')

@section('cards')
    <a href="{{ route('productos.index') }}" class="btn btn-secondary">Volver</a>
@endsection

@section('content')
    <div class="card-header">
        <h3 class="heading">Detalles {{ $producto->NOMBRE_DISFRAZ }}</h3>
    </div>
    <div class="card-body show-product">
        <div class="show-bg">
            <p><strong>ID:</strong> {{ $producto->ID_PRODUCTO }}</p>
            <p><strong>Nombre:</strong> {{ $producto->NOMBRE_DISFRAZ }}</p>
            <p><strong>Descripción:</strong> {{ $producto->DESCRIPCION }}</p>
            <p><strong>Cantidad:</strong> {{ $producto->inventario->CANTIDAD }}</p>
            <p><strong>Precio Unitario:</strong> {{ $producto->inventario->PRECIO_UNITARIO }}</p>
            <p><strong>Categoría:</strong> {{ $producto->categoria->CATEGORIA }}</p>
            <p><strong>Talla:</strong> {{ $producto->talla->NUMERO_TALLA }}</p>
        </div>

        <img class="show-img" src='https://ik.imagekit.io/Bc/disfraz-{{ $producto->ID_PRODUCTO }}.jpeg' alt="{{ $producto->DESCRIPCION }}">
        
        @if ($producto->STATUS)
            <a href="{{ route('productos.edit', $producto->ID_PRODUCTO) }}">Editar</a>
            <form action="{{ route('productos.inhabilitar', $producto->ID_PRODUCTO) }}" method="POST"
                style="display: inline-block">
                @csrf
                @method('PUT')
                <button class="delete-btn" type="submit"
                    onclick="return confirm('¿Estás seguro de que deseas inhabilitar este producto?')">Inhabilitar</button>
            </form>
        @else
            <a href="{{ route('productos.edit', $producto->ID_PRODUCTO) }}">Editar</a>
            <form action="{{ route('productos.habilitar', $producto->ID_PRODUCTO) }}" method="POST"
                style="display: inline-block">
                @csrf
                @method('PUT')
                <button class="enable-btn" type="submit"
                    onclick="return confirm('¿Estás seguro de que deseas habilitar este producto?')">Habilitar</button>
            </form>
        @endif
    </div>
@endsection
