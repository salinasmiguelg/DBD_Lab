<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Metodo_de_pago extends Model
{
    use HasFactory;

    //Relacion
    public function Transaccion(){
        return $this->belongsTo(Transaccion::class);
    }

    public function Proceso_pago(){
        return $this->hasMany(Proceso_pago::class);
    }

   
}
