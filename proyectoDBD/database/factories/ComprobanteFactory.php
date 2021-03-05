<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Comprobante;
use Illuminate\Database\Eloquent\Factories\Factory;

class ComprobanteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comprobante::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'tipo' => $this->faker->randomElement($array = array ('boleta','comprobante')),
            'nombre' => $this->faker->firstName,
            'apellido' => $this->faker->lastName,
            'direccionDespacho' => $this->faker->streetName,
            'metodoPago' => $this->faker->randomElement($array = array ('efectivo','tarjeta')),
            'tipoDespacho' => $this->faker->randomElement($array = array ('personal','domicilio')),
            'total' =>$this->faker->randomNumber,
            'delete' => $this->faker->boolean,
            'id_users' => User::all()->random()->id
            
        ];
    }
}
