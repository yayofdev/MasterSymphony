<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;
    
    public $timestamps=false;

    protected $fillable = [
        'cliente_id',
        'fecha',
        'iva',
        'descuento',
        'total',
        'estado',
    ];
    
    
    public function productos_pedido(){
        return $this->hasMany(Producto_pedido::class);
    }
}
