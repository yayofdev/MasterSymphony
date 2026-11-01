<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    public $timestamps=false;

    public function productos_pedido(){
        return $this->hasMany(Producto_pedido::class);
    }

    public function marca(){
        return $this->belongsTo(Marca::class);
    }

    public function proveedor(){
        return $this->belongsTo(Proveedor::class);
    }

    public function aditivo(){
        return $this->belongsTo(Aditivo::class);
    }

    public function familia(){
        return $this->belongsTo(Familia::class);
    }
}
