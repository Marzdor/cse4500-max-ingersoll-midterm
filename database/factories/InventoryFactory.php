<?php

namespace Database\Factories;

use App\Models\Manufacture;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Inventory>
 */
class InventoryFactory extends Factory
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
            'price' => $this->faker->randomFloat(2, 1, 1000),
            'purchased_on' => $this->faker->dateTime('now', 'UTC'),
            'manufacture_uuid' => Manufacture::factory(),
            'category' => $this->faker->randomElement(['Desktop', 'Phone', 'Laptop']),
            'user_uuid' => User::factory()
        ];
    }
}