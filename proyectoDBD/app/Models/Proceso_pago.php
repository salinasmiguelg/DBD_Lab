<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proceso_pago extends Model
{
    use HasFactory;

    //relacion
    public function Metodo_de_pago(){
        return $this->belongsTo(Metodo_de_pago::class);
    }

    public function Proceso_compra(){
        return $this->hasOne(Proceso_compra::class);
    }
}
