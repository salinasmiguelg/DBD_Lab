<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->firstName,
            'apellido' => $this->faker->lastName,
            'numeroTelefono' => $this->faker->e164PhoneNumber,
            'email' => $this->faker->unique()->freeEmail,
            'email_verified_at' => now(),
            'delete' => $this->faker->randomElement($array = array (false)),
            'contraseña' => $this->faker->password, // password
            'remember_token' => Str::random(10)
        ];
    }
}
