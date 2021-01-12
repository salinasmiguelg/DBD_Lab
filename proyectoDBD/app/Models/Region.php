<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;

    //Relacion con User
    public function User(){
        return $this->belongsTo(User::class);
    }

    public function Comuna(){
        return $this->hasMany(Comuna::class);
    }

}
