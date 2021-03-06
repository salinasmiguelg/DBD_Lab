<?php

namespace Database\Factories;

use App\Models\Transaccion;
use App\Models\Producto;
use App\Models\Transaccion_producto;
use Illuminate\Database\Eloquent\Factories\Factory;

class Transaccion_productoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Transaccion_producto::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_transaccions' => Transaccion::all()->random()->id,
            'id_productos' => Producto::all()->random()->id,
            'cantidad'=>$this->faker->randomNumber,
            'delete' => $this->faker->randomElement($array = array (false)),
        ];
    }
}
