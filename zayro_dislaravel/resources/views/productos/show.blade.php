@extends('layouts.app')

@section('head')
    <title>Ver Producto - Zayro Disfraces</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard/inventory.css') }}">
@endsection

@section('page-title', 'Ver Producto')

@section('cards')
    <a href="{{ route('productos.index') }}" class="btn btn-secondary">Volver</a>
@endsection

@section('content')
    <div class="card-header">
        <h3 class="heading">Detalles Producto</h3>
    </div>
    <div class="card-body">
        <div class="show-bg">
            <p><strong>ID:</strong> {{ $producto->ID_PRODUCTO }}</p>
            <p><strong>Nombre:</strong> {{ $producto->NOMBRE_DISFRAZ }}</p>
            <p><strong>Descripción:</strong> {{ $producto->DESCRIPCION }}</p>
            <p><strong>Cantidad:</strong> {{ $producto->inventario->CANTIDAD }}</p>
            <p><strong>Precio Unitario:</strong> {{ $producto->inventario->PRECIO_UNITARIO }}</p>
            <p><strong>Categoría:</strong> {{ $producto->categoria->CATEGORIA }}</p>
            <p><strong>Talla:</strong> {{ $producto->talla->NUMERO_TALLA }}</p>
        </div>

        <a href="{{ route('productos.edit', $producto->ID_PRODUCTO) }}" class="btn btn-primary">Editar</a>
        <form action="{{ route('productos.destroy', $producto->ID_PRODUCTO) }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Borrar</button>
        </form>
    </div>
@endsection
