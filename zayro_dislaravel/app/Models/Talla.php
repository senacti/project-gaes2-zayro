<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Talla extends Model
{
    protected $table = 'TALLA';
    protected $primaryKey = 'ID_TALLA';
    public $timestamps = false;

    protected $fillable = [
        'ID_TALLA',
        'NUMERO_TALLA',
    ];
}
