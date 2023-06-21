<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard()
    {
        return view('dashboard.dashboard');
    }

    public function clientes()
    {
        return view('dashboard.clientes');
    }

    public function informes()
    {
        return view('dashboard.informes');
    }

    public function pedidos()
    {
        return view('dashboard.pedidos');
    }

    public function inventario()
    {
        return view('dashboard.inventario');
    }

    public function factura()
    {
        return view('dashboard.factura');
    }

    public function vendedores()
    {
        return view('dashboard.vendedores');
    }

    public function marketing()
    {
        return view('dashboard.marketing');
    }

    public function carrito()
    {
        return view('partials.carrito');
    }

}