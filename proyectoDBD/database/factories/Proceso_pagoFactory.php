<?php

namespace Database\Factories;

use App\Models\Metodo_de_pago;
use App\Models\Proceso_pago;
use Illuminate\Database\Eloquent\Factories\Factory;

class Proceso_pagoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Proceso_pago::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'tipoPago' => $this->faker->creditCardType,
            'costeTotal' => $this->faker->numberBetween($min = 1000, $max = 10000),
            'fechaPago' => $this->faker->date,
            'id_metodo_de_pagos' => Metodo_de_pago::Factory()
        ];
    }
}
