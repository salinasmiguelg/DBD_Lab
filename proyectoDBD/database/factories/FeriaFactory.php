<?php

namespace Database\Factories;

use App\Models\Comuna;
use App\Models\Feria;
use Illuminate\Database\Eloquent\Factories\Factory;

class FeriaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Feria::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'descripcion' => $this->faker->text,
            'id_comunas' => Comuna::Factory()
        ];
    }
}
