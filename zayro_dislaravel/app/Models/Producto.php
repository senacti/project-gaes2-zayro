<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'PRODUCTO';
    protected $primaryKey = 'ID_PRODUCTO';
    public $timestamps = false;

    protected $fillable = [
        'NOMBRE_DISFRAZ',
        'DESCRIPCION',
        'ID_CATEGORIA',
        'ID_TALLA',
    ];

    protected $with = ['inventario'];

    public function inventario()
    {
        return $this->belongsTo(Inventario::class, 'ID_INVENTARIO', 'ID_INVENTARIO');
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'ID_CATEGORIA', 'ID_CATEGORIA');
    }

    public function talla()
    {
        return $this->belongsTo(Talla::class, 'ID_TALLA', 'ID_TALLA');
    }
}
