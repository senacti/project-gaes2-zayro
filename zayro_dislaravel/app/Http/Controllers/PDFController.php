<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use Illuminate\Support\Facades\View;
use App\Models\Usuario;
use App\Models\Producto;

class PDFController extends Controller
{
    public function usuariosPDF()
    {
        $usuarios = Usuario::all();

        $data = [
            'title' => 'Reporte Usuarios',
            'usuarios' => $usuarios,
        ];

        $pdf = new Dompdf();

        $html = View::make('pdf.usuarios', $data)->render();
        $pdf->loadHtml($html);
        $pdf->render();

        return $pdf->stream('reporte_usuarios.pdf');
    }

    public function productosPDF()
    {
        $productos = Producto::all();

        $data = [
            'title' => 'Reporte Productos',
            'productos' => $productos,
        ];

        $pdf = new Dompdf();

        $html = View::make('pdf.productos', $data)->render();
        $pdf->loadHtml($html);
        $pdf->render();

        return $pdf->stream('reporte_productos.pdf');
    }
}
