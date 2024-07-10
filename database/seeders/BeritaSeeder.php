<?php

namespace Database\Seeders;

use App\Models\Berita;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class BeritaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // berita seeder

        for ($i = 1; $i <= 10; $i++) {
            Berita::create([
                'title' => $faker->sentence(),
                'tgl_posting' => now()->format('Y-m-d'),
                'category' => $faker->randomElement(['pengumuman', 'prestasi']),
                'penulis'=> 'admin',
                'content' => $faker->paragraph(),
                'image' => 'news.jpeg',
            ]);
        }

    }
}
