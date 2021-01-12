<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaccion_comprobante extends Model
{
    use HasFactory;

    //Relacion

    public function Transaccion(){
        return $this->belongsTo(Transaccion::class);
    }

    public function Comprobante(){
        return $this->belongsTo(Comprobante::class);
    }
}
