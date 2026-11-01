<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto_pedido extends Model
{
    use HasFactory;

    public $timestamps=false;

    protected $fillable = [
        'pedido_id',
        'producto_id',
        'cantidad',
        'precio',
    ];
    

    protected $table='productos_pedido';
    
    public function producto(){
        return $this->belongsTo(Producto::class);
    }

    public function pedido(){
        return $this->belongsTo(Pedido::class);
    }
}
