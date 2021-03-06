<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaccion_producto extends Model
{
    use HasFactory;

    //Relacion

    public function Transaccion(){
        return $this->belongsTo(Transaccion::class);
    }

    public function Producto(){
        return $this->belongsTo(Producto::class);
    }
}
