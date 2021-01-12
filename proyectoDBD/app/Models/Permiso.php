<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permiso extends Model
{
    use HasFactory;

    //Relacion
    public function Rol(){
        return $this->belongsTo(Rol::class);
    }
}
