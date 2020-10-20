<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
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
        echo $this->faker->unique()->numberBetween(1, 2);
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique(true)->email,
            'password' => Hash::make('123456'), // password
            'perfil_id' => $this->faker->unique(true)->numberBetween(1, 2),
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
