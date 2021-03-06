<?php

namespace Database\Factories;

use App\Models\Region;
use App\Models\Comuna;
use Illuminate\Database\Eloquent\Factories\Factory;

class ComunaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comuna::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->randomElement($array = array ('Cerrillos','Cerro Navia','El Bosque','Estación Central','Huechuraba','Independencia','La Cisterna','La Florida','La Granja','La Pintana','La Reina','Las Condes','Lo Barnechea','Lo Espejo','Lo Prado','Macul','Maipú','Ñuñoa','Pedro Aguirre Cerda','Peñalolén','Providencia','Pudahuel','Quilicura','Quinta Normal','Recoleta','Renca','San Joaquín','San Miguel','San Ramón','Santiago','Vitacura')),
            'delete' => $this->faker->randomElement($array = array (false)),
            'id_regions' => Region::all()->random()->id
        ];
    }
}
