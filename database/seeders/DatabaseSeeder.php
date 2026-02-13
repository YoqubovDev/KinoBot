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
        // User::factory(10)->create();

        $this->call([
            MovieSeeder1::class,
            MovieSeeder2::class,
            MovieSeeder3::class,
            MovieSeeder4::class,
            MovieSeeder5::class,
            MovieTitlesSeeder::class,

        ]);
    }
}
