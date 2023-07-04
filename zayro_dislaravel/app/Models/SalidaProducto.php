<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SalidaProducto extends Model
{
    protected $table = 'SALIDA_PRODUCTO';
    public $timestamps = false;
    protected $primaryKey = 'ID_SALIDA_PRODUCTO';

    protected $fillable = [
        'ID_SALIDA_PRODUCTO',
        'NOMBRE_PRODUCTO',
        'FECHA_SALIDA',
        'ID_INVENTARIO',
    ];

    public function inventario()
    {
        return $this->belongsTo(Inventario::class, 'ID_INVENTARIO', 'ID_INVENTARIO');
    }
}
