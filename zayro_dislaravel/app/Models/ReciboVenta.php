<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReciboVenta extends Model
{
    protected $table = 'RECIBO_VENTA';
    protected $primaryKey = 'ID_RECIBO_VENTA';
    public $timestamps = false;

    protected $fillable = [
        'CANTIDAD',
        'METODO_PAGO',
        'PRECIO_UNIDAD',
        'PRECIO_TOTAL',
        'FECHA',
        'ID_ORDEN',
        'ID_USUARIO',
    ];

    public function orden()
    {
        return $this->belongsTo(Orden::class, 'ID_ORDEN');
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'ID_USUARIO');
    }
}
