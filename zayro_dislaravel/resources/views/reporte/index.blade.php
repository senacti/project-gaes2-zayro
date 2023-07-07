<!-- reporte/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="filter-container">
            <h1 class="filter-title">Reportes</h1>

            <!-- Filter Form -->
            <form method="POST" action="{{ route('reporte.filter') }}">
                @csrf

                <!-- Filter Criteria for Usuario -->
                <div class="form-group">
                    <label for="filtro_usuario">Filtro Usuario</label>
                    <input type="text" name="filtro_usuario" id="filtro_usuario" class="form-control"
                        placeholder="Nombre de usuario">
                </div>

                <!-- Filter Criteria for Producto -->
                <div class="form-group">
                    <label for="filtro_producto">Filtro Producto</label>
                    <input type="text" name="filtro_producto" id="filtro_producto" class="form-control"
                        placeholder="Nombre de producto">
                </div>

                <!-- Filter Criteria for Inventario -->
                <div class="form-group">
                    <label for="filtro_inventario">Filtro Inventario</label>
                    <input type="number" name="filtro_inventario" id="filtro_inventario" class="form-control"
                        placeholder="Cantidad en inventario">
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary">Filtrar</button>
            </form>

            <!-- Display Filtered Data -->
            @if (isset($filteredData))
                <h2 class="filter-title">Resultados de la búsqueda:</h2>

                <!-- Display Usuarios -->
                @if ($filteredData['usuarios']->count() > 0)
                    <h3 class="filter-subtitle">Usuarios:</h3>
                    <ul>
                        @foreach ($filteredData['usuarios'] as $usuario)
                            <div class="filter-user">
                                <li>{{ $usuario->NOMBRE }}</li>
                                <li>{{ $usuario->email }}</li>
                                <li>{{ $usuario->TELEFONO_1 }}</li>
                                <li>{{ $usuario->DIRECCION_BOGOTA }}</li>
                                <li>{{ $usuario->RolSistema->DESCRIPCION_ROLES }}</li>
                            </div>
                        @endforeach
                    </ul>
                @else
                    <p>No se encontraron usuarios.</p>
                @endif

                <!-- Display Productos -->
                @if ($filteredData['productos']->count() > 0)
                    <h3 class="filter-subtitle">Productos:</h3>
                    <ul>
                        @foreach ($filteredData['productos'] as $producto)
                            <div class="filter-product">
                                <li>{{ $producto->NOMBRE_DISFRAZ }}</li>
                                <li>{{ $producto->DESCRIPCION }}</li>
                                <li>${{ $producto->inventario->PRECIO_UNITARIO }}</li>
                                <li>{{ $producto->inventario->CANTIDAD }}</li>
                            </div>
                        @endforeach
                    </ul>
                @else
                    <p>No se encontraron productos.</p>
                @endif

                <!-- Display Inventarios -->
                @if ($filteredData['inventarios']->count() > 0)
                    <h3 class="filter-subtitle">Inventarios:</h3>
                    <ul>
                        @foreach ($filteredData['inventarios'] as $inventario)
                            <div class="filter-inventario">
                                <li>{{ $inventario->ID_INVENTARIO }}</li>
                                <li>{{ $inventario->CANTIDAD }}</li>
                                <li>${{ $inventario->PRECIO_UNITARIO }}</li>
                            </div>
                        @endforeach
                    </ul>
                @else
                    <p>No se encontraron inventarios.</p>
                @endif
            @endif
        </div>
    </div>
@endsection
