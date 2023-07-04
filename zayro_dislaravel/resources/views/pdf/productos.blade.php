@extends('pdf.template')

@section('content')
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
            </tr>
        </thead>
        <tbody>
            @foreach ($productos as $producto)
                <tr>
                    <td>{{ $producto->ID_PRODUCTO }}</td>
                    <td>{{ $producto->NOMBRE_DISFRAZ }}</td>
                    <td>{{ $producto->DESCRIPCION }}</td>
                    <td>{{ $producto->inventario->CANTIDAD }}</td>
                    <td>{{ $producto->inventario->PRECIO_UNITARIO }}</td>
                    <td>{{ $producto->categoria->CATEGORIA }}</td>
                    <td>{{ $producto->talla->NUMERO_TALLA }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
