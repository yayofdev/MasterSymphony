<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Administrador extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table='administradores';

    public $timestamps=false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nombre',
        'apellido',
        'usuario',
        'rol',
        'correo',
        'contrasenia',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        /* 'password',
        'remember_token', */
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'contrasenia' => 'hashed',
    ];

    public function isMaster(){
        return ($this->rol=='superadmin')?true:false;
    }

    public function isAdmin(){
        return ($this->rol=='admin')?true:false;
    }

    public function isEditor(){
        return ($this->rol=='editor')?true:false;
    }

    public function isSoporte(){
        return ($this->rol=='soporte')?true:false;
    }
}
/* extends Model
{
    use HasFactory;

    protected $table='administradores'; //para que el sistema no busque en ingles en plural
    
    public $timestamps=false;
    
} */
