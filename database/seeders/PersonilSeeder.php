<?php

namespace Database\Seeders;

use App\Models\Personil;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PersonilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i = 1; $i <= 10; $i++) {
            Personil::create([
                'name' => Str::random(10),
                'email' => Str::random(10) . '@example.com',
                'phone' => rand(1000000000, 9999999999),
                'jabatan' => Str::random(10),
                'image' => 'person.jpg',
            ]);
        }
    }
}
