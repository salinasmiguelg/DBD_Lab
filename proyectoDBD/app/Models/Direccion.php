<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Direccion extends Model
{
    use HasFactory;

    //Relacion
    public function Comuna(){
        return $this->belongsTo(Comuna::class);
    }

    public function User(){
        return $this->belongsTo(User::class);
    }

    public function Proceso_despacho(){
        return $this->hasMany(Proceso_despacho::class);
    }

}
