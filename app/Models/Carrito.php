<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrito extends Model
{
    use HasFactory;

    public $timestamps=false;

    public function cliente(){
        return $this->belongsTo(Marca::class);
    }

    public function producto(){
        return $this->belongsTo(Marca::class);
    }
}
