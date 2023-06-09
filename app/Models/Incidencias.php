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
        return $this->belongsTo('App\Models\User', 'idUser', 'id');
    }

    public function equipo()
    {
        return $this->belongsTo('App\Models\Equipos', 'idEquipo', 'id');
    }

    public function asignadoPor()
    {
        return $this->belongsTo('App\Models\User', 'idAsignadoPor', 'id');
    }

    public function asignadoA()
    {
        return $this->belongsTo('App\Models\User', 'idAsignadoA', 'id');
    }

    public function estado()
    {
        return $this->belongsTo('App\Models\Estados', 'idEstado', 'id');
    }

    public function tipoIncidencia()
    {
        return $this->belongsTo('App\Models\Tipos', 'idTipoIncidencia', 'id');
    }
    public function notificaciones()
    {
        return $this->hasOne('App\Models\Notificacion', 'idIncidencia', 'id');
    }
}
