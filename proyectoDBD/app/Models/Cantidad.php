<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cantidad extends Model
{
    use HasFactory;

    //Relacion
    public function Producto(){
        return $this->hasOne(Producto::class);
    }


}
