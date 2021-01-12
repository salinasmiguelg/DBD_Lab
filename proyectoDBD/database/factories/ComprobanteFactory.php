<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Comprobante;
use Illuminate\Database\Eloquent\Factories\Factory;

class ComprobanteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comprobante::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'tipo' => $this->faker->randomElement($array = array ('boleta','comprobante')),
            'id_users' => User::all()->random()->id
        ];
    }
}
