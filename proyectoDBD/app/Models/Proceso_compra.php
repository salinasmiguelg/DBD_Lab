<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proceso_compra extends Model
{
    use HasFactory;

    //Relacion
    public function Comprobante(){
        return $this->belongsTo(Comprobante::class);
    }

    public function Proceso_despacho(){
        return $this->belongsTo(Proceso_despacho::class);
    }

    public function Proceso_pago(){
        return $this->belongsTo(Proceso_pago::class);
    }

    public function Producto(){
        return $this->hasOne(Producto::class);
    }
}
