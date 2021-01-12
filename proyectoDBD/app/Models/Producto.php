<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    //Relacion
    public function Cantidad(){
        return $this->belongsTo(Cantidad::class);
    }

    public function Proceso_compra(){
        return $this->belongsTo(Proceso_compra::class);
    }

    public function Puesto_producto(){
        return $this->hasMany(Puesto_producto::class);
    }

    public function Transaccion_producto(){
        return $this->hasMany(Transaccion_producto::class);
    }
}
