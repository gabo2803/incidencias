<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Areas extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'piso',
    ];

    public function equipos(){
    	return $this->hasMany('App\Models\Equipo', 'idArea', 'id');
    }

    public function cargos(){
    	return $this->hasMany('App\MOdels\Cargo', 'idArea', 'id');
    }
}
