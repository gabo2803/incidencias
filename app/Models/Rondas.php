<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rondas extends Model
{
    use HasFactory;
    protected $fillable = [
        'cedulaPaciente',
        'idUsario',
        'AfiNombre1',
        'AfiNombre2',
        'AfiApellido1',
        'AfiApellido2',
        'sexo',
        'descripcion'             
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'idUsuario');
    }

    public function Preguntas_respuestas()
    {
        return $this->hasMany(PreguntasRespuestas::class,'idRonda');
    }
}