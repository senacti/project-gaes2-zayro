<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrdenProducto extends Model
{
    protected $table = 'ORDEN_PRODUCTO';
    public $timestamps = false;
    protected $primaryKey = null;
    public $incrementing = false;

    protected $fillable = [
        'ID_ORDEN',
        'ID_PRODUCTO',
    ];

    public function orden()
    {
        return $this->belongsTo(Orden::class, 'ID_ORDEN', 'ID_ORDEN');
    }

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'ID_PRODUCTO', 'ID_PRODUCTO');
    }
}
