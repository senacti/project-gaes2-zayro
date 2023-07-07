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
                    <th>ID Inventario</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Cantidad</th>
                    <th>Precio Unitario</th>
                    <th>Categoría</th>
                    <th>Talla</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($productos as $producto)
                    <tr>
                        <td>{{ $producto->ID_PRODUCTO }}</td>
                        <td>{{ $producto->ID_INVENTARIO }}</td>
                        <td>{{ $producto->NOMBRE_DISFRAZ }}</td>
                        <td>{{ $producto->DESCRIPCION }}</td>
                        <td>{{ $producto->inventario->CANTIDAD ?? 'N/A' }}</td>
                        <td>${{ $producto->inventario->PRECIO_UNITARIO ?? 'N/A' }}</td>
                        <td>{{ $producto->categoria->CATEGORIA }}</td>
                        <td>{{ $producto->talla->NUMERO_TALLA }}</td>
                        <td>
                            @if ($producto->STATUS)
                                <a href="{{ route('productos.show', $producto->ID_PRODUCTO) }}">Ver</a>
                                <a href="{{ route('productos.edit', $producto->ID_PRODUCTO) }}">Editar</a>
                                <form action="{{ route('productos.inhabilitar', $producto->ID_PRODUCTO) }}" method="POST"
                                    style="display: inline-block">
                                    @csrf
                                    @method('PUT')
                                    <button class="delete-btn" type="submit"
                                        onclick="return confirm('¿Estás seguro de que deseas inhabilitar este producto?')">Inhabilitar</button>
                                </form>
                            @else
                                <a href="{{ route('productos.show', $producto->ID_PRODUCTO) }}">Ver</a>
                                <a href="{{ route('productos.edit', $producto->ID_PRODUCTO) }}">Editar</a>
                                <form action="{{ route('productos.habilitar', $producto->ID_PRODUCTO) }}" method="POST"
                                    style="display: inline-block">
                                    @csrf
                                    @method('PUT')
                                    <button class="enable-btn" type="submit"
                                        onclick="return confirm('¿Estás seguro de que deseas habilitar este producto?')">Habilitar</button>
                                </form>
                            @endif
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
