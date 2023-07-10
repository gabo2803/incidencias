<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notificacion extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'reporto',
        'activo',
        'idIncidencia',
        'responsable',

    ];

    public function users()
    {
        return $this->belongsTo('App\Models\User', 'reporto', 'id');
    }
    public function supers()
    {
        return $this->belongsTo('App\Models\Supers', 'responsable', 'id');
    }

    public function equipos()
    {
        return $this->belongsTo('App\Models\Equipos', 'activo', 'id');
    }
    public function incidencias()
    {
        return $this->belongsTo('App\Models\Incidencias', 'idIncidencia', 'id');
    }
}
