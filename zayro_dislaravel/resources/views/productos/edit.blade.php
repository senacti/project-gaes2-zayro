@extends('layouts.app')

@section('head')
    <title>Editar Producto - Zayro Disfraces</title>
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
            <div>
                <label for="ID_PRODUCTO">ID:</label>
                <input type="text" name="ID_PRODUCTO" id="id_producto" value="{{ $producto->ID_PRODUCTO }}">
            </div>
            <div>
                <label for="nombre_disfraz">Nombre:</label>
                <input type="text" name="NOMBRE_DISFRAZ" id="nombre_disfraz" value="{{ $producto->NOMBRE_DISFRAZ }}">
            </div>
            <div>
                <label for="descripcion">Descripcion:</label>
                <textarea name="DESCRIPCION" id="descripcion">{{ $producto->DESCRIPCION }}</textarea>
            </div>
            <div>
                <label for="cantidad">Cantidad:</label>
                <textarea name="CANTIDAD" id="cantidad">{{ $producto->inventario->CANTIDAD }}</textarea>
            </div>
            <div>
                <label for="precio_unitario">Precio Unitario:</label>
                <textarea name="PRECIO_UNITARIO" id="precio_unitario">{{ $producto->inventario->PRECIO_UNITARIO }}</textarea>
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
            <button type="submit">Actualizar</button>
        </form>
    </div>
@endsection
