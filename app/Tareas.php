<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tareas extends Model
{
    protected $fillable = [
        'nombre', 'fecha', 'hora','user','descripcion'
    ];
}
