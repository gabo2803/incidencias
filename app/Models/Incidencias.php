<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incidencias extends Model
{
    use HasFactory;
    protected $fillable =
    [
        'idUser',
        'idEquipo',
        'titulo',
        'descripcion',
        'observacion',
        'prioridad',
        'fechaLimite',
        'idAsignadoPor',
        'idAsignadoA',
        'idEstado',
        'idTipoIncidencia',
        'comentarioSolucion',
    ];


    public function user()
    {
        return $this->belongsTo(User::class,'idUser');
    }

    public function equipo()
    {
        return $this->belongsTo(Equipos::class,'idEquipo');
    }

    public function asignadoPor()
    {
        return $this->belongsTo(User::class,'idAsignadoPor');
    }

    public function asignadoA()
    {
        return $this->belongsTo(User::class,'idAsignadoA');
    }
    
    public function estado()
    {
        return $this->belongsTo(Estados::class,'idEstado');
    }

    public function tipoIncidencia()
    {
        return $this->belongsTo(Tipos::class,'idTipoIncidencia');
    }
    
    public function notificaciones()
    {
        return $this->hasOne(Notificacion::class,'idIncidencia');
    }
}
