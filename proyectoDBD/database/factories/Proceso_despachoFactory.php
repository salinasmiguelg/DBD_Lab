<?php

namespace Database\Factories;

use App\Models\Direccion;
use App\Models\Proceso_despacho;
use Illuminate\Database\Eloquent\Factories\Factory;

class Proceso_despachoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Proceso_despacho::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'tipo_despacho' => $this->faker->randomElement($array = array ('Entrega a domicilio','Retiro en tienda')),
            'fecha_despacho' => $this->faker->date,
            'elementos_despachados' => $this->faker->numberBetween($min = 1, $max = 10),
            'coste_despacho' => $this->faker->numberBetween($min = 1000, $max = 10000),
            'delete' => $this->faker->randomElement($array = array (false)),
            'id_direccions' => Direccion::all()->random()->id

        ];
    }
}
