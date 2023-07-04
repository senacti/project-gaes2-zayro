<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Descuento extends Model
{
    protected $table = 'DESCUENTOS';
    protected $primaryKey = 'ID_DESCUENTOS';
    public $timestamps = false;

    protected $fillable = [
        'ID_DESCUENTOS',
        'PORCENTAJE_DESCUENTO',
        'ID_INVENTARIO',
    ];

    public function inventario()
    {
        return $this->belongsTo(Inventario::class, 'ID_INVENTARIO', 'ID_INVENTARIO');
    }
}
