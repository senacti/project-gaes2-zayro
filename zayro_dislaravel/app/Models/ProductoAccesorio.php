<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductoAccesorio extends Model
{
    protected $table = 'PRODUCTO_ACCESORIOS';
    public $timestamps = false;
    protected $primaryKey = null;
    public $incrementing = false;

    protected $fillable = [
        'ID_PRODUCTO',
        'ID_ACCESORIO',
    ];

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'ID_PRODUCTO', 'ID_PRODUCTO');
    }

    public function accesorio()
    {
        return $this->belongsTo(Accesorio::class, 'ID_ACCESORIO', 'ID_ACCESORIO');
    }
}
