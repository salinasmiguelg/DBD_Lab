<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comuna extends Model
{
    use HasFactory;

    //Relacion
    public function Region(){
        return $this->belongsTo(Region::class);
    }

    public function Direccion(){
        return $this->hasOne(Direccion::class);
    }

    public function Feria(){
        return $this->hasMany(Feria::class);
    }
}
