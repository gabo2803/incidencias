<?php

namespace App\Models;

use App\Http\Controllers\IncidenciasController;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;



class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;
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
        return $this->hasMany(Incidencias::class,'idUser');
    }
    
    public function Notificacions()
    {
        return $this->hasMany(Notificacion::class,'reporto');    
    }
       

    public function incidenciasAsignadas()
    {
        return $this->hasMany(Incidencias::class,'idAsignadoPor');
    }

    public function incidenciasRecibidas()
    {
        return $this->hasMany(Incidencias::class,'idAsignadoA');
    }

    public function cargo()
    {
        return $this->belongsTo(Cargos::class,'idCargo');
    }

    public function equipos()
    {
        return $this->belongsToMany(Equipos::class,'userequipos', 'idUser', 'idEquipo');
    }

    public function supers()
    {
        return $this->hasMany(Supers::class,'responsable');
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
