<?php

namespace Database\Factories;

use App\Models\Puesto;
use App\Models\Producto;
use App\Models\Puesto_producto;
use Illuminate\Database\Eloquent\Factories\Factory;

class Puesto_productoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Puesto_producto::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'delete' => $this->faker->boolean,
            'id_puestos' => Puesto::all()->random()->id,
            'id_productos' => Producto::all()->random()->id
        ];
    }
}
