<?php

namespace Database\Factories;

use App\Models\Transaccion;
use App\Models\Comprobante;
use App\Models\Transaccion_comprobante;
use Illuminate\Database\Eloquent\Factories\Factory;

class Transaccion_comprobanteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Transaccion_comprobante::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_transaccions' => Transaccion::all()->random()->id,
            'id_comprobantes' => Comprobante::all()->random()->id,
            'delete' => $this->faker->randomElement($array = array (false))
        ];
    }
}
