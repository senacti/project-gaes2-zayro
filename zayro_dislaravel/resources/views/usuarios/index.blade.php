@extends('layouts.app')

@section('head')
    <title>Usuarios - Zayro Disfraces</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard/inventory.css') }}">
@endsection

@section('page-title', 'Usuarios')

@section('cards')
    @include('usuarios.cards')
@endsection

@section('content')
    <div class="card-header">
        <h3 class="heading">Lista Usuarios</h3>
    </div>
    <div class="card-body">
        <a href="{{ route('usuarios.create') }}" class="btn btn-primary">Crear Usuario</a>

        <table class="table mt-4">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Rol</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($usuarios as $usuario)
                    <tr>
                        <td>{{ $usuario->ID_USUARIO }}</td>
                        <td>{{ $usuario->NOMBRE }}</td>
                        <td>{{ $usuario->email }}</td>
                        <td>{{ $usuario->rolSistema->DESCRIPCION_ROLES }}</td>
                        <td>
                            <a href="{{ route('usuarios.show', $usuario->ID_USUARIO) }}" class="btn btn-primary">Ver</a>
                            <a href="{{ route('usuarios.edit', $usuario->ID_USUARIO) }}" class="btn btn-primary">Editar</a>
                            <form action="{{ route('usuarios.destroy', $usuario->ID_USUARIO) }}" method="POST"
                                class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="delete-btn" type="submit">Borrar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <form action="{{ route('usuarios.pdf') }}" method="GET" target="_blank">
            <button type="submit">Generar PDF</button>
        </form>        
    </div>
@endsection
