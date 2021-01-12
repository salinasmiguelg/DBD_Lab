<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Puesto_producto extends Model
{
    use HasFactory;

    //Relacion
    public function Producto(){
        return $this->belongsTo(Producto::class);
    }

    public function Puesto(){
        return $this->belongsTo(Puesto::class);
    }
}
