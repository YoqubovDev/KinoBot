<?php
// database/seeders/MovieSeeder4.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class MovieSeeder4 extends Seeder
{
    public function run()
    {
        $movies = [];

        // Kodlar 139 dan boshlanadi
        $startCode = 139;

        // Logdan olingan videolar
        $logEntries = [
            [
                'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBLmmOJN8rb0lgOHnH8w4teX-5n0bTAALAlwACevRYSAGQv_dQwgmpOgQ',
                'message_id' => 302,
            ],
            [
                'file_id' => 'BAACAgQAAyEFAATW7Y_gAAIBL2mOJN8qd8iCCl5U69dvtGvDyb8uAAJhCwACVBpZU9msHcluyTKKOgQ',
                'message_id' => 303,
            ],
            [
                'file_id' => 'BAACAgQAAyEFAATW7Y_gAAIBH2mMb-o-f9i_Qy9HXj9SkJNv4oLPAAKoHgACyUTYU64lZj9BuainOgQ',
                'message_id' => 304,
            ],
        ];

        $currentCode = $startCode;

        foreach ($logEntries as $index => $entry) {
            $movies[] = [
                'code' => (string) $currentCode,
                'channel_id' => env('TELEGRAM_CHANNEL_USERNAME', '@KinolarOlami'),
                'message_id' => $entry['message_id'],
                'file_id' => $entry['file_id'],
                'views' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];

            $currentCode++;
        }

        DB::table('movies')->insert($movies);

        $this->command->info(count($movies) . ' ta kino seed qilindi!');

        foreach ($movies as $index => $movie) {
            $this->command->line(
                ($index + 1)
                . ". Code: {$movie['code']}"
                . " - File ID: {$movie['file_id']}"
                . " - Message ID: {$movie['message_id']}"
            );
        }

        $this->command->info('Kodlar 139 dan boshlab ' . ($currentCode - 1) . ' gacha');
    }
}
