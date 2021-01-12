<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Puesto extends Model
{
    use HasFactory;

    //Relacion

    public function Rol(){
        return $this->belongsTo(Rol::class);
    }

    public function User(){
        return $this->belongsTo(User::class);
    }

    public function Feria(){
        return $this->belongsTo(Feria::class);
    }

    public function Puesto_producto(){
        return $this->hasMany(Puesto_producto::class);
    }
}
