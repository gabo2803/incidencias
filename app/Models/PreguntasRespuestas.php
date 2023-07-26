<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreguntasRespuestas extends Model
{
    use HasFactory;
    protected $fillable =
    [
        'respuesta',
        'pregunta',
        'idRonda'        
    ];

    public function rondas()
    {
        return $this->belongsTo(Rondas::class,'idRonda');
    }
   
}
