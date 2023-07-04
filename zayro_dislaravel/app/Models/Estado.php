<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $table = 'ESTADO';
    public $timestamps = false;
    protected $primaryKey = 'ID_ESTADO';

    protected $fillable = [
        'ID_ESTADO',
        'DESCRIPCION_ESTADO',
        'FECHA_ENVIO',
        'FECHA_DEVOLUCION',
        'ID_ENVIO',
    ];

    public function envio()
    {
        return $this->belongsTo(Envio::class, 'ID_ENVIO', 'ID_ENVIO');
    }
}
