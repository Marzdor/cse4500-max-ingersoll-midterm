<?php

namespace Database\Factories;

use App\Models\Manufacturer;
use App\Models\Purchase;
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
        $fakeName = $this->faker->word();
        $fakeSerial = $fakeName . '-' . strval($this->faker->randomNumber(3, true)) . '-' . strval($this->faker->randomNumber(6, true));

        return [
            'name' => $fakeName,
            'category' => $this->faker->randomElement(['Desktop', 'Phone', 'Laptop', 'Tablet']),
            'specifications' => [
                "serial_number" => $fakeSerial,
                "processor" => $this->faker->word(),
                "ram" => strval($this->faker->randomNumber(2, true)) . 'Gb',
                "storage" => strval($this->faker->randomNumber(3, true)) . 'Gb',
                "mac_address" => $this->faker->macAddress()
            ],
            'purchase_uuid' => Purchase::factory(),
            'manufacturer_uuid' => Manufacturer::factory(),
        ];
    }
}