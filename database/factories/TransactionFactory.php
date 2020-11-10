<?php

namespace Database\Factories;

use App\Models\Transaction;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransactionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Transaction::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'transaction_value' => $this->faker->randomFloat(2, -1000.00, 999999.99),
            'credit_card_id'    => $this->faker->unique(true)->numberBetween(1, 100),
            'user_to_id'        => $this->faker->numberBetween(1, 100),
            'user_id'           => $this->faker->numberBetween(1,100)
        ];
    }
}
