<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provedores extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
         'nit',
         'email',
         'direccion',
         'telefono'
        ];

        public function equipos(){
            return $this->hasMany('App\Models\Equipos', 'idProvedor', 'id');
        }
}
