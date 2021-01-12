<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comprobante extends Model
{
    use HasFactory;

    //Relacion
    public function User(){
        return $this->belongsTo(User::class);
    }

    public function Transaccion_comprobante(){
        return $this->hasMany(Transaccion_comprobante::class);
    }

    public function Proceso_compra(){
        return $this->hasOne(Proceso_compra::class);
    }
    
}
