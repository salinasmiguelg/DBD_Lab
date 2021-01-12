<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proceso_despacho extends Model
{
    use HasFactory;

    //relacion
    public function Proceso_compra(){
        return $this->hasOne(Proceso_compra::class);
    }

    public function Direccion(){
        return $this->belongsTo(Direccion::class);
    }
}
