<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Usuario;
use App\Models\Orden;
use App\Models\Campaña;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard()
    {
        $productoCount = Producto::count();
        $usuarioCount = Usuario::count();
        $ordenCount = Orden::count();
        $activeCampaña = Campaña::whereDate('FECHA_INICIO', '<=', now())
            ->whereDate('FECHA_FIN', '>=', now())
            ->first();

        if ($activeCampaña === null) {
            $activeCampaña = "Ninguna";
        }
        // $customQueryResult = DB::select('SELECT * FROM your_table');
        $ordenes = Orden::orderBy('ID_ORDEN', 'desc')->take(10)->get();

        $usuarios = Usuario::whereHas('rolSistema', function ($query) {
            $query->where('DESCRIPCION_ROLES', 'CLIENTE');
        })->orderBy('ID_USUARIO', 'desc')->take(7)->get();

        return view('dashboard.dashboard', compact('productoCount', 'usuarioCount', 'ordenCount', 'activeCampaña', 'ordenes', 'usuarios'));
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