<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaccion_user extends Model
{
    use HasFactory;

    //Relacion

    public function Transaccion(){
        return $this->belongsTo(Transaccion::class);
    }

    public function User(){
        return $this->belongsTo(User::class);
    }
}
