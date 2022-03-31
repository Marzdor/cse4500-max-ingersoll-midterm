<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Purchase>
 */
class PurchaseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'price' => $this->faker->randomFloat(2, 1, 1000),
            'purchased_on' => $this->faker->date(),
            'user_info' => [
                'first_name' => $this->faker->firstName(),
                'last_name' => $this->faker->lastName(),
                'phone_number' => $this->faker->numerify('###-###-####'),
                'email' => $this->faker->email(),
            ]
        ];
    }
}