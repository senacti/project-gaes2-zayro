<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Campaña extends Model
{
    protected $table = 'CAMPAÑAS';
    protected $primaryKey = 'ID_CAMPAÑA';
    
    public $timestamps = false;

    protected $fillable = [
        'ID_CAMPAÑA',
        'NOMBRE_CAMPAÑA',
        'DESCRIPCION',
        'EMAIL_CLIENTES',
        'FECHA_INICIO',
        'FECHA_FIN',
        'ID_USUARIO',
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'ID_USUARIO', 'ID_USUARIO');
    }
}
