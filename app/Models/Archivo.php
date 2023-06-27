<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Archivo extends Model
{
    use HasFactory;

    protected $fillable = [
        'idEquipo',
        'nombre',
        'ruta'
    ];

    public function equipo()
   
    {
        return $this->hasMany('App\Models\Equipos', 'idEquipo','id');
    }
}
