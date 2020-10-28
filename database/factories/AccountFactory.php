<?php

namespace Database\Factories;

use App\Models\Account;
use Illuminate\Database\Eloquent\Factories\Factory;

class AccountFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Account::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'agency'            => $this->faker->unique(true)->numberBetween(0, 9999),
            'account_number'    => $this->faker->unique(true)->numberBetween(0, 99999),
            'account_dg'        => $this->faker->numberBetween(0, 10),
            'user_id'           => $this->faker->unique(true)->numberBetween(1, 100),
        ];
    }
}
