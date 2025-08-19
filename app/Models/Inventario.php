<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    protected $table = 'inventarios';

    protected $fillable = [
        'marca',
        'modelo',
        'anio',
        'precio',
        'estado',
        'kilometraje',
        'color'
    ];
}

