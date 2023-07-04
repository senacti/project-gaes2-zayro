@extends('layouts.app')

@section('head')
    <title>Productos - Zayro Disfraces</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard/inventory.css') }}">
@endsection

@section('page-title', 'Productos')

@section('cards')
    @include('productos.cards')
@endsection

@section('content')
    <div class="card-header">
        <h3 class="heading">Lista Productos</h3>
    </div>
    <div class="card-body">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Cantidad</th>
                    <th>Precio Unitario</th>
                    <th>Categoria</th>
                    <th>Talla</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($productos as $producto)
                    <tr>
                        <td>{{ $producto->ID_PRODUCTO }}</td>
                        <td>{{ $producto->NOMBRE_DISFRAZ }}</td>
                        <td>{{ $producto->DESCRIPCION }}</td>
                        <td>{{ $producto->inventario->CANTIDAD }}</td>
                        <td>${{ $producto->inventario->PRECIO_UNITARIO }}</td>
                        <td>{{ $producto->categoria->CATEGORIA }}</td>
                        <td>{{ $producto->talla->NUMERO_TALLA }}</td>
                        <td>
                            <a href="{{ route('productos.show', $producto->ID_PRODUCTO) }}">Ver</a>
                            <a href="{{ route('productos.edit', $producto->ID_PRODUCTO) }}">Editar</a>
                            <form action="{{ route('productos.destroy', $producto->ID_PRODUCTO) }}" method="POST"
                                style="display: inline-block">
                                @csrf
                                @method('DELETE')
                                <button class="delete-btn" type="submit">Borrar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <a href="{{ route('productos.create') }}">Crear nuevo producto</a>
        <form action="{{ route('productos.pdf') }}" method="GET" target="_blank">
            <button type="submit">Generar PDF</button>
        </form>     
    </div>
@endsection
