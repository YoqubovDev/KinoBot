<?php

namespace Database\Seeders;

use App\Models\Movie;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            MovieSeeder1::class,
            MovieSeeder2::class,
            MovieSeeder3::class,
            MovieSeeder4::class,
            MovieSeeder5::class,
            MovieSeeder6::class,
            MovieSeeder7::class,
            MovieSeeder8::class,
            MovieSeeder9::class,
            MovieSeeder10::class,
            MovieSeeder11::class,
            SerialSeeder::class,
        ]);
    }
}
