<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permiso extends Model
{
    protected $table = 'PERMISOS';

    protected $primaryKey = 'ID_PERMISO';

    public $timestamps = false;

    protected $fillable = [
        'ID_PERMISO',
        'PERMISO',
    ];
}
