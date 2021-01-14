<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Rol;
use Illuminate\Database\Eloquent\Factories\Factory;

class RolFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Rol::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'nombre'=>$this->faker->word,
            'delete' => $this->faker->boolean,
            'id_users' => User::all()->random()->id
        ];
    }
}
