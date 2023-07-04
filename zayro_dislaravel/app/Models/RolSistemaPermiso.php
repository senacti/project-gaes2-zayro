<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RolSistemaPermiso extends Model
{
    protected $table = 'ROLES_SISTEMA_PERMISOS';
    protected $primaryKey = ['ID_ROL', 'ID_PERMISO'];
    public $incrementing = false;

    protected $fillable = [
        'ID_ROL',
        'ID_PERMISO',
    ];

    public function rolSistema()
    {
        return $this->belongsTo(RolSistema::class, 'ID_ROL', 'ID_ROL');
    }

    public function permiso()
    {
        return $this->belongsTo(Permiso::class, 'ID_PERMISO', 'ID_PERMISO');
    }
}
