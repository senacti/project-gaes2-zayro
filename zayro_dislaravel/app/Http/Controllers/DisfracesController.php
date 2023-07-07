<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Inventario;
use App\Models\Categoria;
use App\Models\Talla;

class DisfracesController extends Controller
{
    public function index()
    {
        $productos = Producto::with('inventario', 'categoria', 'talla')->where('STATUS', true)->get();
        // $cartData = $this->getCartData(); // Retrieve the cart data

        return view('disfraces.index', [
            'productos' => $productos,
            // 'cartData' => $cartData, // Pass the cart data to the view
        ]);
    }
}