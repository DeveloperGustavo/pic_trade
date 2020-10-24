<?php

namespace Database\Factories;

use App\Models\CreditCard;
use Illuminate\Database\Eloquent\Factories\Factory;

class CreditCardFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CreditCard::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'number'            => $this->faker->creditCardNumber,
            'expiration_date'   => $this->faker->creditCardExpirationDate,
            'cvv'               => $this->faker->unique(true)->numberBetween(100, 999),
            'user_id'           => $this->faker->unique(true)->numberBetween(1, 100),
        ];
    }
}
