<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transportadora extends Model
{
    protected $table = 'TRANSPORTADORA';
    protected $primaryKey = 'ID_TRANSPORTADORA';
    public $timestamps = false;

    protected $fillable = [
        'ID_TRANSPORTADORA',
        'NOMBRE_TRANSPORTADORA',
        'CONTACTO',
    ];
}
