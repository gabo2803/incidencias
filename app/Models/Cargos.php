<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cargos extends Model
{
    use HasFactory;
    protected $fillable = 
    [
        'descripcion',
        'idArea'
    ];

    public function users(){
    	return $this->hasMany('App\Models\User', 'idCargo', 'id');
    }

    public function area(){
	   	return $this->belongsTo('App\Models\Area', 'idArea', 'id');
    }
}
