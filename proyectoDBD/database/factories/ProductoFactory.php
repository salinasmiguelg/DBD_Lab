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
            'nombreProducto'=>$this->faker->randomElement($array = array ('Papa' , 'Acelga' , 'Lechuga','Tomate','Pala','Escoba')),
            'precioUnitario'=>$this->faker->unique()->numberBetween(1, 10000),
            'stock'=>$this->faker->unique()->numberBetween(1, 100),
            'categoria'=>$this->faker->randomElement($array = array ('Fruta' , 'Verdura' , 'Articulo de aseo','Mariscos','Ropa','Juguetes')),
            'delete' => $this->faker->randomElement($array = array (false)),
            'id_proceso_compras' => Proceso_compra::all()->random()->id,
            'id_cantidads' => Cantidad::all()->random()->id
        ];
    }
}
