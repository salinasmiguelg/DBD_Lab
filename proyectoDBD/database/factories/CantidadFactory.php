<?php

namespace Database\Factories;

use App\Models\Cantidad;
use Illuminate\Database\Eloquent\Factories\Factory;

class CantidadFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Cantidad::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'tipoDeCantidad'=> $this->faker->randomElement($array = array ('Kilos' , 'Unidades' , 'Cajas')),
            'delete' => $this->faker->randomElement($array = array (false))

        ];
    }
}
