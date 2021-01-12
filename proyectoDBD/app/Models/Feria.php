<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feria extends Model
{
    use HasFactory;

    //Relacion
    public function Comuna(){
        return $this->belongsTo(Comuna::class);
    }

    public function Puesto(){
        return $this->hasMany(Puesto::class);
    }
}
