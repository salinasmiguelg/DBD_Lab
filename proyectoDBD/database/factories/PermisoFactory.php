<?php

namespace Database\Factories;

use App\Models\Rol;
use App\Models\Permiso;
use Illuminate\Database\Eloquent\Factories\Factory;


class PermisoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Permiso::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'nombre' => $this->faker->randomElement($array = array ('Crear Usuario' , 'Borrar Usuario','Modificar Usuario')),
            'delete' => $this->faker->randomElement($array = array (false)),
            'id_rols' => Rol::all()->random()->id
        ];
    }
}
