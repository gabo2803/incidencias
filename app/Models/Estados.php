<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estados extends Model
{
    use HasFactory;

    protected $fillable = 
    [
        'descripcion',
    ];

    public function incidencias(){
    	return $this->hasMany('App\Incidencia', 'idEstado', 'id');
    }
}
