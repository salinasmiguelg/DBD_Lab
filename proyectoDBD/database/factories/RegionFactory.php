<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Region;
use Illuminate\Database\Eloquent\Factories\Factory;

class RegionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Region::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->randomElement($array = array ('Arica y Parinacota','Tarapaca','Antofagasta','Atacama','Coquimbo','Valparaiso','Metropolitana de Santiago','Libertador General Bernardo O´Higgins','Maule','Ñuble','Biobio','La Araucania','Los Rios','Los Lagos','Aysen del General Carlos Ibáñez del Campo','Magallanes y la Antártica Chilena')),
            'delete' => $this->faker->randomElement($array = array (false)),
            'id_users' => User::all()->random()->id
        ];
    }
}
