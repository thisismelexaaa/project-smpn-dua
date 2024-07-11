<?php

namespace Database\Seeders;

use App\Models\kritikDanSaran;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class KritikDanSaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 1; $i <= 10; $i++) {
            kritikDanSaran::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'message' => $faker->paragraph(),
                'rating' => $faker->numberBetween(1, 5),
            ]);
        }
    }
}
