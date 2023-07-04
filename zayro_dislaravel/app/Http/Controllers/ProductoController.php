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
        $productos = Producto::all();
        $productCount = Producto::count();

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

        return view('productos.index', compact('productos', 'productCount', 'popularCategoriaName', 'popularTallaName'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $inventarios = Inventario::all();
        $categorias = Categoria::all();
        $tallas = Talla::all();
        return view('productos.create', compact('inventarios', 'categorias', 'tallas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'ID_PRODUCTO' => 'required',
            'NOMBRE_DISFRAZ' => 'required',
            'DESCRIPCION' => 'required',
            'CANTIDAD' => 'required',
            'PRECIO' => 'required',
            'ID_CATEGORIA' => 'required',
            'ID_TALLA' => 'required',
        ]);

        $producto = Producto::create($request->all());

        return redirect()->route('productos.index')->with('success', 'Producto created successfully');
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
        $inventarios = Inventario::all();
        $categorias = Categoria::all();
        $tallas = Talla::all();
        return view('productos.edit', compact('producto', 'inventarios', 'categorias', 'tallas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'ID_PRODUCTO' => 'required',
            'NOMBRE_DISFRAZ' => 'required',
            'DESCRIPCION' => 'required',
            'CANTIDAD' => 'required',
            'PRECIO' => 'required',
            'ID_CATEGORIA' => 'required',
            'ID_TALLA' => 'required',
        ]);

        $producto = Producto::findOrFail($id);
        $producto->update($request->all());

        return redirect()->route('productos.index')->with('success', 'Producto updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->delete();

        return redirect()->route('productos.index')->with('success', 'Producto deleted successfully');
    }
}