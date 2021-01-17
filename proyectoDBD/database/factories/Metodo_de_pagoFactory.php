<?php

namespace Database\Factories;

use App\Models\Transaccion;
use App\Models\Metodo_de_pago;
use Illuminate\Database\Eloquent\Factories\Factory;

class Metodo_de_pagoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Metodo_de_pago::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'numero_tarjeta' => $this->faker->creditCardNumber,
            'tipo_de_cuenta_bancaria' => $this->faker->creditCardType,
            'banco' => $this->faker->randomElement($array = array ('Banco Estado','Santander','BCI','Banco de Chile')),
            'titular' => $this->faker->name,
            'id_transaccions' => Transaccion::all()->random()->id,
            'delete' => $this->faker->boolean
        ];
    }
}
