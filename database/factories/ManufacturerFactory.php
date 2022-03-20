<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Manufacturer>
 */
class ManufacturerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'sales_info' => [
                'email' => $this->faker->companyEmail(),
                'phone_number' => $this->faker->phoneNumber()
            ],
            'tech_support' => [
                'email' => $this->faker->companyEmail(),
                'phone_number' => $this->faker->phoneNumber()
            ],
        ];
    }
}
