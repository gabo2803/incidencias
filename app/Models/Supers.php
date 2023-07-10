<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supers extends Model
{
    use HasFactory;
    
    protected $fillable = 
    [
        'nombre',
        'responsable'
    ];

    public function equipos(){
    	return $this->hasMany('App\Models\Equipos', 'idSuperCategoria','id');
    }
    public function notificacions(){
        return $this->hasMany('App\Models\Notificacion', 'responsable','id');
    }
    public function users(){
        return $this->belongsTo('App\Models\User', 'responsable','id');
    }
}
