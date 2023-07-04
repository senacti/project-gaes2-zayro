<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EntradaProducto extends Model
{
    protected $table = 'ENTRADA_PRODUCTO';
    public $timestamps = false;
    protected $primaryKey = 'ID_ENTRADA_PRODUCTO';

    protected $fillable = [
        'ID_ENTRADA_PRODUCTO',
        'NOMBRE_PRODUCTO',
        'FECHA_ENTRADA',
        'ID_INVENTARIO',
    ];

    public function inventario()
    {
        return $this->belongsTo(Inventario::class, 'ID_INVENTARIO', 'ID_INVENTARIO');
    }
}
