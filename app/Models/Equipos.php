<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipos extends Model
{
    use HasFactory;


    protected $fillable =
    [
        'serial',
        'descripcion',
        'caracteristicas',
        'fechaAdquirido',
        'fechaAsignado',
        'marca',
        'modelo',
        'garantia',
        'servitag',
        'idProveedor',
        'tipoActivo',
        'fechaVencGar',
        'idSuperCategoria',
        'idArea',
        'estado',
        'calibracion',
        'frecuenciaCal',
        'fechaUltimaCal',
        'riesgo',
        'precio'
    ];

    public function users()
    {
        return $this->belongsToMany('App\Models\User', 'userequipos', 'idEquipo', 'idUser')->withTimestamps();
    }
    public function notificaciones()
    {
        return $this->hasMany('App\Models\Notificaciones', 'activo', 'id');
    }

    public function incidencias()
    {
        return $this->hasMany('App\Models\Incidencia', 'idEquipo', 'id');
    }

    public function supers()
    {
        return $this->belongsTo('App\Models\Super', 'idSuperCategoria', 'id');
    }
    public function proveedores()
    {
        return $this->belongsTo('App\Models\Proveedores', 'idProveedor', 'id');
    }

    public function area()
    {
        return $this->belongsTo('App\Models\Areas', 'idArea', 'id');
    }

    public function archivos()
    {
        return $this->belongsTo('App\Models\Archivo', 'idArchivo', 'id');
    }
}
