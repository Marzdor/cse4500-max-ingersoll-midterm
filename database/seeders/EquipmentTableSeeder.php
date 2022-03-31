<?php

namespace Database\Seeders;

use App\Models\Equipment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EquipmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Equipment::truncate();
        Equipment::factory()->count(5)->create();

        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 5; $i++) {
            $fakeName = $faker->word();
            $fakeSerial = $fakeName . '-' . strval($faker->randomNumber(3, true)) . '-' . strval($faker->randomNumber(6, true));

            Equipment::create([
                'name' => $fakeName,
                'category' => $faker->randomElement(['Desktop', 'Phone', 'Laptop', 'Tablet']),
                'specifications' => [
                    "serial_number" => $fakeSerial,
                    "processor" => $faker->word(),
                    "ram" => strval($faker->randomNumber(2, true)) . 'Gb',
                    "storage" => strval($faker->randomNumber(3, true)) . 'Gb',
                    "mac_address" => $faker->macAddress()
                ],
                'purchase_uuid' => '',
                'manufacturer_uuid' => '',
            ]);
        }
    }
}