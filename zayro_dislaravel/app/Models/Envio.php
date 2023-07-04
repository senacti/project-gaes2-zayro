<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Envio extends Model
{
    protected $table = 'ENVIOS';
    protected $primaryKey = 'ID_ENVIO';
    public $timestamps = false;

    protected $fillable = [
        'ID_ENVIO',
        'NUMERO_RADICADO_ENVIO',
        'ID_TRANSPORTADORA',
    ];

    public function transportadora()
    {
        return $this->belongsTo(Transportadora::class, 'ID_TRANSPORTADORA', 'ID_TRANSPORTADORA');
    }
}
