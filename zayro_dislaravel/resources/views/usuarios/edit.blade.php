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
        <h3 class="heading">Editar Usuario</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('usuarios.update', $usuario->ID_USUARIO) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="NOMBRE" id="nombre" class="form-control" value="{{ $usuario->NOMBRE }}"
                    required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ $usuario->email }}"
                    required>
            </div>

            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="fecha_nacimiento">Fecha de Nacimiento</label>
                <input type="date" name="FECHA_NACIMIENTO" id="fecha_nacimiento" class="form-control"
                    value="{{ $usuario->FECHA_NACIMIENTO }}" required>
            </div>

            <div class="form-group">
                <label for="telefono1">Teléfono 1</label>
                <input type="text" name="TELEFONO_1" id="telefono1" class="form-control"
                    value="{{ $usuario->TELEFONO_1 }}" required>
            </div>

            <div class="form-group">
                <label for="telefono2">Teléfono 2</label>
                <input type="text" name="TELEFONO_2" id="telefono2" class="form-control"
                    value="{{ $usuario->TELEFONO_2 }}">
            </div>

            <div class="form-group">
                <label for="direccion_bogota">Dirección Bogotá</label>
                <input type="text" name="DIRECCION_BOGOTA" id="direccion_bogota" class="form-control"
                    value="{{ $usuario->DIRECCION_BOGOTA }}" required>
            </div>

            <div class="form-group">
                <label for="rol">Rol</label>
                <select name="ID_ROL" id="rol" class="form-control" required>
                    @foreach ($roles as $rol)
                        <option value="{{ $rol->ID_ROL }}" {{ $usuario->ID_ROL === $rol->ID_ROL ? 'selected' : '' }}>
                            {{ $rol->DESCRIPCION_ROLES }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
@endsection
