<?php

namespace Database\Factories;

use App\Models\Feria;
use App\Models\Rol;
use App\Models\User;
use App\Models\Puesto;
use Illuminate\Database\Eloquent\Factories\Factory;

class PuestoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Puesto::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'categoria'=>$this->faker->text,
            'descripcion'=>$this->faker->text,
            'delete' => $this->faker->boolean,
            'id_users' => User::all()->random()->id,
            'id_ferias' => Feria::all()->random()->id,
            'id_rols' => Rol::all()->random()->id
        ];
    }
}
