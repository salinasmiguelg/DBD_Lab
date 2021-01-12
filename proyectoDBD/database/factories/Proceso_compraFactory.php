<?php

namespace Database\Factories;

use App\Models\Comprobante;
use App\Models\Proceso_pago;
use App\Models\Proceso_compra;
use App\Models\Proceso_despacho;
use Illuminate\Database\Eloquent\Factories\Factory;

class Proceso_compraFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Proceso_compra::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'pagoRealizado'=>$this->faker->boolean,
            'fechaPago'=>$this->faker->date,
            'id_comprobantes' => Comprobante::all()->random()->id,
            'id_proceso_pagos' => Proceso_pago::all()->random()->id,
            'id_proceso_despachos' => Proceso_despacho::all()->random()->id
        ];
    }
}
