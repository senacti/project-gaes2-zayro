<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Inventario;
use App\Models\Categoria;
use App\Models\Talla;
// use App\Models\Cart;

class DisfracesController extends Controller
{
    public function index()
    {
        $productos = Producto::all();
        // $cartData = $this->getCartData(); // Retrieve the cart data

        return view('disfraces.index', [
            'productos' => $productos,
            // 'cartData' => $cartData, // Pass the cart data to the view
        ]);
    }

    // private function getCartData()
    // {
    //     // Retrieve the cart data from the database
    //     $cart = Cart::first();

    //     return $cart ? [
    //         'products' => $cart->products,
    //         'totalPrice' => $cart->totalPrice,
    //     ] : [
    //         'products' => [],
    //         'totalPrice' => 0,
    //     ];
    // }
}