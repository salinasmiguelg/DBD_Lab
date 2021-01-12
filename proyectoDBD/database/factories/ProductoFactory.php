<?php

namespace Database\Factories;

use App\Models\Cantidad;
use App\Models\Proceso_compra;
use App\Models\Producto;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Producto::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'nombreProducto'=>$this->faker->word,
            'precioUnitario'=>$this->faker->randomNumber,
            'stock'=>$this->faker->randomNumber,
            'categoria'=>$this->faker->word,
            'id_proceso_compras' => Proceso_compra::all()->random()->id,
            'id_cantidads' => Cantidad::all()->random()->id
        ];
    }
}
