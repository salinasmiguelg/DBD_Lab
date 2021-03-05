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
            'descripcion' => $this->faker->randomElement($array = array ('Feria Aconcagua' , 'Lo Valledor' , 'La Vega','Feria Nocedal','Feria Tocornal')),
            'id_comunas' => Comuna::all()->random()->id,
            'delete' => $this->faker->boolean
        ];
    }
}
