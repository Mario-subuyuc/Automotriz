<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    protected $table = 'inventarios';

    use HasFactory;

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

