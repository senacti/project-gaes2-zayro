<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReciboVentaProducto extends Model
{
    protected $table = 'RECIBO_VENTA_PRODUCTO';
    public $timestamps = false;

    protected $fillable = [
        'ID_PRODUCTO',
        'ID_RECIBO_VENTA',
    ];

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'ID_PRODUCTO', 'ID_PRODUCTO');
    }

    public function reciboVenta()
    {
        return $this->belongsTo(ReciboVenta::class, 'ID_RECIBO_VENTA', 'ID_RECIBO_VENTA');
    }
}
