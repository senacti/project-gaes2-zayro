@extends('layouts.app')

@section('head')
    <title>Editar {{$producto->NOMBRE_DISFRAZ}} - Zayro Disfraces</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard/inventory.css') }}">
@endsection

@section('page-title', 'Editar Producto')

@section('cards')
    <a href="{{ route('productos.index') }}" class="btn btn-secondary">Volver</a>
@endsection

@section('content')
    <div class="card-header">
        <h3 class="heading">Editar Producto</h3>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('productos.update', $producto->ID_PRODUCTO) }}">
            @csrf
            @method('PUT')
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div>
                <label for="nombre_disfraz">Nombre:</label>
                <input type="text" name="NOMBRE_DISFRAZ" id="nombre_disfraz" value="{{ $producto->NOMBRE_DISFRAZ }}">
            </div>
            <div>
                <label for="descripcion">Descripcion:</label>
                <input type="text" name="DESCRIPCION" id="descripcion" value="{{ $producto->DESCRIPCION }}">
            </div>
            <div>
                <label for="cantidad">Cantidad:</label>
                <input type="number" name="CANTIDAD" id="cantidad" value="{{ $producto->inventario->CANTIDAD }}">
            </div>
            <div>
                <label for="precio_unitario">Precio Unitario:</label>
                <input type="number" name="PRECIO_UNITARIO" id="precio_unitario" value="{{ $producto->inventario->PRECIO_UNITARIO }}">
            </div>
            <div>
                <label for="id_categoria">Categoria:</label>
                <select name="ID_CATEGORIA" id="id_categoria">
                    @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->ID_CATEGORIA }}"
                            {{ $categoria->ID_CATEGORIA == $producto->ID_CATEGORIA ? 'selected' : '' }}>
                            {{ $categoria->CATEGORIA }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="id_talla">Talla:</label>
                <select name="ID_TALLA" id="id_talla">
                    @foreach ($tallas as $talla)
                        <option value="{{ $talla->ID_TALLA }}"
                            {{ $talla->ID_TALLA == $producto->ID_TALLA ? 'selected' : '' }}>{{ $talla->NUMERO_TALLA }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" onclick="return confirm('¿Estás seguro de que deseas actualizar este producto?')">Actualizar</button>
        </form>
    </div>
@endsection
