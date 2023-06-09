<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'primerNombre', 
        'segundoNombre',
        'primerApellido', 
        'segundoApellido',
        'username', 
        'password',
        'email',
        'rol',
        'idCargo',
        'activo',
        'sexo',       
        
        ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function incidencias()
    {
        return $this->hasMany('App\Models\Incidencias', 'idUser', 'id');
    }
    
    public function Notificacions(){
        return $this->hasMany('App\Models\Notificacion', 'reporto', 'id');    
    }
       

    public function incidenciasAsignadas(){
        return $this->hasMany('App\Models\Incidencias', 'idAsignadoPor', 'id');
    }

    public function incidenciasRecibidas(){
        return $this->hasMany('App\Models\Incidencias', 'idAsignadoA', 'id');
    }

    public function cargo(){
        return $this->belongsTo('App\Models\Cargos', 'idCargo', 'id');
    }

    public function equipos(){
        return $this->belongsToMany('App\Models\Equipos', 'userequipos', 'idUser', 'idEquipo');
    }
    public function supers(){
        return $this->hasMany('App\Models\Super', 'responsable','id');
    }


    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
