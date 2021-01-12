<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaccion extends Model
{
    use HasFactory;

    //Relacion
    public function Transaccion_user(){
        return $this->hasMany(Transaccion_user::class);
    }

    public function Transaccion_comprobante(){
        return $this->hasMany(Transaccion_comprobante::class);
    }

    public function Transaccion_producto(){
        return $this->hasMany(Transaccion_producto::class);
    }

    public function Metodo_de_pago(){
        return $this->hasOne(Metodo_de_pago::class);
    }
}
