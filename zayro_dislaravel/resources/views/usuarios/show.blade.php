@extends('layouts.app')

@section('head')
    <title>Usuarios - Zayro Disfraces</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard/inventory.css') }}">
@endsection

@section('page-title', 'Usuarios')

@section('cards')
    <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">Volver</a>
@endsection

@section('content')
    <div class="card-header">
        <h3 class="heading">Detalles Usuario</h3>
    </div>
    <div class="card-body">
        <div class="show-bg">
            <p><strong>ID:</strong> {{ $usuario->ID_USUARIO }}</p>
            <p><strong>Nombre:</strong> {{ $usuario->NOMBRE }}</p>
            <p><strong>Email:</strong> {{ $usuario->email }}</p>
            <p><strong>Fecha de Nacimiento:</strong> {{ $usuario->FECHA_NACIMIENTO }}</p>
            <p><strong>Teléfono 1:</strong> {{ $usuario->TELEFONO_1 }}</p>
            <p><strong>Teléfono 2:</strong> {{ $usuario->TELEFONO_2 }}</p>
            <p><strong>Dirección Bogotá:</strong> {{ $usuario->DIRECCION_BOGOTA }}</p>
            <p><strong>Rol:</strong> {{ $usuario->rolSistema->DESCRIPCION_ROLES }}</p>
        </div>

        <a href="{{ route('usuarios.edit', $usuario->ID_USUARIO) }}" class="btn btn-primary">Editar</a>
        <form action="{{ route('usuarios.destroy', $usuario->ID_USUARIO) }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="delete-btn">Borrar</button>
        </form>
    </div>
@endsection
