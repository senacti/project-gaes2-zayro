<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DescuentoCampaña extends Model
{
    protected $table = 'DESCUENTOS_CAMPAÑAS';
    protected $primaryKey = null;
    public $timestamps = false;

    protected $fillable = [
        'ID_DESCUENTOS',
        'ID_CAMPAÑA',
    ];

    public function descuento()
    {
        return $this->belongsTo(Descuento::class, 'ID_DESCUENTOS', 'ID_DESCUENTOS');
    }

    public function campaña()
    {
        return $this->belongsTo(Campaña::class, 'ID_CAMPAÑA', 'ID_CAMPAÑA');
    }
}
