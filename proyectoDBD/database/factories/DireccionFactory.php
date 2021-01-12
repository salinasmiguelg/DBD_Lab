<?php

namespace Database\Factories;

use App\Models\Region;
use App\Models\Comuna;
use App\Models\Direccion;
use Illuminate\Database\Eloquent\Factories\Factory;

class DireccionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Direccion::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'calle' => $this->faker->streetName,
            'numero' => $this->faker->buildingNumber,
            'es_departamento' => $this->boolean,
            'id_regions' => Region::Factory(),
            'id_comunas' => Comuna::Factory()
        ];
    }
}
