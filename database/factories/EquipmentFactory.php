<?php

namespace Database\Factories;

use App\Models\Manufacturer;
use App\Models\Purchase;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Equipment>
 */
class EquipmentFactory extends Factory
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
            'category' => $this->faker->randomElement(['Desktop', 'Phone', 'Laptop']),
            'purchase_uuid' => Purchase::factory(),
            'manufacturer_uuid' => Manufacturer::factory(),
            'user_uuid' => User::factory()
        ];
    }
}
