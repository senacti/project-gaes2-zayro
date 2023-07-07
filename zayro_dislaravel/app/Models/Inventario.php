<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    protected $table = 'INVENTARIO';
    protected $primaryKey = 'ID_INVENTARIO';
    public $timestamps = false;

    protected $fillable = [
        'CANTIDAD',
        'PRECIO_UNITARIO',
        'ID_USUARIO',
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'ID_USUARIO', 'ID_USUARIO');
    }
}
