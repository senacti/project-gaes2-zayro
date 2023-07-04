@extends('pdf.template')

@section('content')
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Rol</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($usuarios as $usuario)
                <tr>
                    <td>{{ $usuario->ID_USUARIO }}</td>
                    <td>{{ $usuario->NOMBRE }}</td>
                    <td>{{ $usuario->email }}</td>
                    <td>{{ $usuario->rolSistema->DESCRIPCION_ROLES }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
