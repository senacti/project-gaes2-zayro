<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Inventario;
use App\Models\Categoria;
use App\Models\Talla;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = Producto::with('inventario', 'categoria', 'talla')->get();
        
        $productCount = DB::table('PRODUCTO')
            ->where('STATUS', '=', '1')
            ->count();

        $disabledCount = DB::table('PRODUCTO')
            ->where('STATUS', '=', '0')
            ->count();

        $popularCategoria = DB::table('PRODUCTO')
            ->select('ID_CATEGORIA', DB::raw('COUNT(*) as category_count'))
            ->groupBy('ID_CATEGORIA')
            ->orderByDesc('category_count')
            ->first();

        $popularTalla = DB::table('PRODUCTO')
            ->select('ID_TALLA', DB::raw('COUNT(*) as size_count'))
            ->groupBy('ID_TALLA')
            ->orderByDesc('size_count')
            ->first();

        $popularCategoriaName = Categoria::find($popularCategoria->ID_CATEGORIA)->CATEGORIA;
        $popularTallaName = Talla::find($popularTalla->ID_TALLA)->NUMERO_TALLA;

        return view('productos.index', compact('productos', 'productCount', 'popularCategoriaName', 'popularTallaName', 'disabledCount'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Categoria::all();
        $tallas = Talla::all();
        return view('productos.create', compact('categorias', 'tallas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'NOMBRE_DISFRAZ' => ['required', 'string', 'max:255', 'regex:/^[a-zA-Z0-9\s]+$/'],
            'DESCRIPCION' => ['required', 'string', 'regex:/^[a-zA-Z0-9\s\.,-]+$/'],
            'ID_CATEGORIA' => 'required',
            'ID_TALLA' => 'required',
            'CANTIDAD' => ['required', 'integer', 'min:1', 'max:100'],
            'PRECIO_UNITARIO' => ['required', 'integer', 'min:50000', 'max:300000'],
        ], [
            'NOMBRE_DISFRAZ.required' => 'El nombre del disfraz es obligatorio.',
            'NOMBRE_DISFRAZ.string' => 'El nombre del disfraz debe ser una cadena de texto.',
            'NOMBRE_DISFRAZ.max' => 'El nombre del disfraz no puede exceder los 255 caracteres.',
            'NOMBRE_DISFRAZ.regex' => 'El nombre del disfraz solo puede contener letras, números y espacios.',
            'DESCRIPCION.required' => 'La descripción es obligatoria.',
            'DESCRIPCION.string' => 'La descripción debe ser una cadena de texto.',
            'DESCRIPCION.regex' => 'La descripción solo puede contener letras, números, espacios, comas, puntos y guiones.',
            'CANTIDAD.required' => 'La cantidad es obligatoria.',
            'CANTIDAD.integer' => 'La cantidad debe ser un número entero.',
            'CANTIDAD.min' => 'La cantidad debe ser mayor o igual a 1.',
            'CANTIDAD.max' => 'La cantidad no puede exceder 100.',
            'PRECIO_UNITARIO.required' => 'El precio unitario es obligatorio.',
            'PRECIO_UNITARIO.integer' => 'El precio unitario debe ser un valor entero.',
            'PRECIO_UNITARIO.min' => 'El precio unitario debe ser mayor o igual a 50000',
            'PRECIO_UNITARIO.max' => 'El precio unitario no puede exceder 300000',
        ]);

        // Create the Producto record
        $producto = Producto::create([
            'NOMBRE_DISFRAZ' => $request->input('NOMBRE_DISFRAZ'),
            'DESCRIPCION' => $request->input('DESCRIPCION'),
            'ID_CATEGORIA' => $request->input('ID_CATEGORIA'),
            'ID_TALLA' => $request->input('ID_TALLA'),
        ]);

        // Retrieve the associated Inventario record
        $inventario = new Inventario;
        $inventario->CANTIDAD = $request->input('CANTIDAD');
        $inventario->PRECIO_UNITARIO = $request->input('PRECIO_UNITARIO');
        // Set other Inventario column values if needed

        // Save the Inventario record
        $inventario->save();

        // Associate the Inventario record to the created Producto
        $producto->inventario()->associate($inventario);
        $producto->save();

        return redirect()->route('productos.index')->with('success', 'Producto creado exitosamente');
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $producto = Producto::findOrFail($id);
        return view('productos.show', compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $producto = Producto::findOrFail($id);
        $categorias = Categoria::all();
        $tallas = Talla::all();
        return view('productos.edit', compact('producto', 'categorias', 'tallas'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'NOMBRE_DISFRAZ' => ['required', 'string', 'max:255', 'regex:/^[a-zA-Z0-9\s]+$/'],
            'DESCRIPCION' => ['required', 'string', 'regex:/^[a-zA-Z0-9\s\.,-]+$/'],
            'ID_CATEGORIA' => 'required',
            'ID_TALLA' => 'required',
            'CANTIDAD' => ['required', 'integer', 'min:1', 'max:100'],
            // Adjust the min and max values as needed
            'PRECIO_UNITARIO' => ['required', 'integer', 'min:50000', 'max:300000'], // Adjust the min and max values as needed
        ], [
            'NOMBRE_DISFRAZ.required' => 'El nombre del disfraz es obligatorio.',
            'NOMBRE_DISFRAZ.string' => 'El nombre del disfraz debe ser una cadena de texto.',
            'NOMBRE_DISFRAZ.max' => 'El nombre del disfraz no puede exceder los 255 caracteres.',
            'NOMBRE_DISFRAZ.regex' => 'El nombre del disfraz solo puede contener letras, números y espacios.',
            'DESCRIPCION.required' => 'La descripción es obligatoria.',
            'DESCRIPCION.string' => 'La descripción debe ser una cadena de texto.',
            'DESCRIPCION.regex' => 'La descripción solo puede contener letras, números, espacios, comas, puntos y guiones.',
            'CANTIDAD.required' => 'La cantidad es obligatoria.',
            'CANTIDAD.integer' => 'La cantidad debe ser un número entero.',
            'CANTIDAD.min' => 'La cantidad debe ser mayor o igual a 1.',
            'CANTIDAD.max' => 'La cantidad no puede exceder 100.',
            'PRECIO_UNITARIO.required' => 'El precio unitario es obligatorio.',
            'PRECIO_UNITARIO.integer' => 'El precio unitario debe ser un valor entero.',
            'PRECIO_UNITARIO.min' => 'El precio unitario debe ser mayor o igual a 50000',
            'PRECIO_UNITARIO.max' => 'El precio unitario no puede exceder 300000',
        ]);

        $producto = Producto::findOrFail($id);

        // Update the Producto record
        $producto->update([
            'NOMBRE_DISFRAZ' => $request->input('NOMBRE_DISFRAZ'),
            'DESCRIPCION' => $request->input('DESCRIPCION'),
            'ID_CATEGORIA' => $request->input('ID_CATEGORIA'),
            'ID_TALLA' => $request->input('ID_TALLA'),
        ]);

        // Retrieve the associated Inventario record
        $inventario = $producto->inventario;

        if ($inventario) {
            // Update the CANTIDAD and PRECIO_UNITARIO values of the associated Inventario record
            $inventario->update([
                'CANTIDAD' => $request->input('CANTIDAD'),
                'PRECIO_UNITARIO' => $request->input('PRECIO_UNITARIO'),
            ]);
        }

        return redirect()->route('productos.index')->with('success', 'Producto actualizado exitosamente');
    }

    public function inhabilitar($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->STATUS = false;
        $producto->save();

        return redirect()->route('productos.index')->with('success', 'Producto inhabilitado correctamente');
    }

    public function habilitar($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->STATUS = true;
        $producto->save();

        return redirect()->route('productos.index')->with('success', 'Producto habilitado correctamente');
    }
}