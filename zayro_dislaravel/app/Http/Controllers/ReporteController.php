<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Models\Producto;
use App\Models\Inventario;
use App\Models\Categoria;
use App\Models\Talla;
use App\Models\RolSistema;
use Illuminate\Http\Request;

class ReporteController extends Controller
{
    public function index()
    {
        return view('reporte.index');
    }

    public function filter(Request $request)
    {
        // Retrieve the filter criteria from the request
        $filtro_usuario = $request->input('filtro_usuario');
        $filtro_producto = $request->input('filtro_producto');
        $filtro_inventario = $request->input('filtro_inventario');

        // Query the Usuario model based on the filtro_usuario filter
        $usuarios = Usuario::when($filtro_usuario, function ($query) use ($filtro_usuario) {
            $query->where('NOMBRE', 'LIKE', '%' . $filtro_usuario . '%');
        })->get();

        // Query the Producto model based on the filtro_producto filter
        $productos = Producto::when($filtro_producto, function ($query) use ($filtro_producto) {
            $query->where('NOMBRE_DISFRAZ', 'LIKE', '%' . $filtro_producto . '%');
        })->get();

        // Query the Inventario model based on the filtro_inventario filter
        $inventarios = Inventario::when($filtro_inventario, function ($query) use ($filtro_inventario) {
            $query->where('CANTIDAD', '>=', $filtro_inventario);
        })->get();

        // Combine the filtered data into a single array
        $filteredData = [
            'usuarios' => $usuarios,
            'productos' => $productos,
            'inventarios' => $inventarios,
        ];

        // Pass the filtered data to the view
        return view('reporte.index', compact('filteredData'));
    }
}
