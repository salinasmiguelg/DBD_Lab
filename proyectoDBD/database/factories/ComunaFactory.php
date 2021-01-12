<?php

namespace Database\Factories;

use App\Models\Region;
use App\Models\Comuna;
use Illuminate\Database\Eloquent\Factories\Factory;

class ComunaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comuna::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->state,
            'id_regions' => Region::all()->random()->id
        ];
    }
}
