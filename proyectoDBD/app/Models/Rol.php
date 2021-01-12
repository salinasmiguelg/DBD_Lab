<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    use HasFactory;

    //Relacion
    public function User(){
        return $this->belongsTo(User::class);
    }

    public function Permiso(){
        return $this->hasMany(Permiso::class);
    }

    public function Puesto(){
        return $this->hasMany(Puesto::class);
    }
}
