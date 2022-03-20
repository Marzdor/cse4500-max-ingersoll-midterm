<?php

namespace Database\Factories;

use App\Models\Manufacture;
use App\Models\Purchase;
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
            'category' => $this->faker->randomElement(['Desktop', 'Phone', 'Laptop']),
            'purchase_uuid' => Purchase::factory(),
            'manufacture_uuid' => Manufacture::factory(),
            'user_uuid' => User::factory()
        ];
    }
}
