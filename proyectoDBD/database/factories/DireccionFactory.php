<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Comuna;
use App\Models\Direccion;
use Illuminate\Database\Eloquent\Factories\Factory;

class DireccionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Direccion::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'calle' => $this->faker->streetName,
            'numero' => $this->faker->buildingNumber,
            'es_departamento' => $this->faker->boolean,
            'id_users' => User::all()->random()->id,
            'id_comunas' => Comuna::all()->random()->id,
            'delete' => $this->faker->boolean
        ];
    }
}
