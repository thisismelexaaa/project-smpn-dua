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
            DB::table('personils')->insert([
                'name' => Str::random(10),
                'email' => Str::random(10).'@example.com',
                'phone' => Str::random(10),
                'jabatan' => Str::random(10),
                'image' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
