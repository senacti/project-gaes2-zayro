<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RolSistema extends Model
{
    protected $table = 'ROLES_SISTEMA';

    protected $primaryKey = 'ID_ROL';

    public $timestamps = false;

    protected $fillable = [
        'ID_ROL',
        'DESCRIPCION_ROLES',
    ];
}
