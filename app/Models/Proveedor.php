<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;

    protected $table='proveedores'; //para que el sistema no busque en ingles en plural
    
    public $timestamps=false;
    
    public function productos(){
        return $this->hasMany(Producto::class);
    }
}
