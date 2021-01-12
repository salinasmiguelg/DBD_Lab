<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    public function Region(){
        return $this->hasOne(Region::class);
    }

    public function Direccion(){
        return $this->hasMany(Direccion::class);
    }

    public function Rol(){
        return $this->hasMany(Rol::class);
    }

    public function Comprobante(){
        return $this->hasMany(Comprobante::class);
    }

    public function Puesto(){
        return $this->hasMany(Puesto::class);
    }

    public function Transaccion_user(){
        return $this->hasMany(Transaccion_user::class);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
