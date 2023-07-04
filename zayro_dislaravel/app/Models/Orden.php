<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orden extends Model
{
    protected $table = 'ORDEN';
    protected $primaryKey = 'ID_ORDEN';
    public $timestamps = false;

    protected $fillable = [
        'ID_ORDEN',
        'CANTIDAD',
        'METODO_PAGO',
        'PRECIO',
        'PRECIO_TOTAL',
        'ID_ENVIO',
        'ID_USUARIO',
        'ID_INVENTARIO',
        'ID_TALLA',
    ];

    public function envio()
    {
        return $this->belongsTo(Envio::class, 'ID_ENVIO', 'ID_ENVIO');
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'ID_USUARIO', 'ID_USUARIO');
    }

    public function inventario()
    {
        return $this->belongsTo(Inventario::class, 'ID_INVENTARIO', 'ID_INVENTARIO');
    }

    public function talla()
    {
        return $this->belongsTo(Talla::class, 'ID_TALLA', 'ID_TALLA');
    }
}
