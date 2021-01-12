<?php

namespace Database\Factories;

use App\Models\Transaccion;
use App\Models\User;
use App\Models\Transaccion_user;
use Illuminate\Database\Eloquent\Factories\Factory;

class Transaccion_userFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Transaccion_user::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_transaccions' => Transaccion::Factory(),
            'id_users' => User::Factory()
        ];
    }
}
