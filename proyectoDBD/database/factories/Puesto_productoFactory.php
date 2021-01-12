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
            'id_puestos' => Puesto::Factory(),
            'id_productos' => Producto::Factory()
        ];
    }
}
