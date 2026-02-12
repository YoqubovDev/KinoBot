<?php
// database/seeders/MovieSeeder2.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class MovieSeeder3 extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $movies = [];
        
        // 26 dan boshlab ketma-ket kodlar
        $startCode = 136;

        // Log fayldan olingan ma'lumotlar
        $logEntries = [
            // Birinchi video
            [
                'file_id' => 'BAACAgQAAyEFAATW7Y_gAAIBIWmMcT0-xPRY6EvRzOY9MfCIQJaGAAJsIQACwkVYUHNpZlzpHidSOgQ',
                'message_id' => 295,
            ],
             [
                'file_id' => 'BAACAgQAAyEFAATW7Y_gAAIBJWmMcT3BYXscs2KLVWt48J3DFoK_AALGGgACaquIUvo-54F4swG8OgQ',
                'message_id' => 299,
            ],
             [
                'file_id' => 'BAACAgQAAyEFAATW7Y_gAAIBLGmMcwNnoi_9WVCNpz5_MQABKKrnhQACySEAAhW7WFMOqGLG0qcz9joE',
                'message_id' => 301,
            ],
        ];

        // Har bir video uchun ma'lumotlar
        $currentCode = $startCode;
        foreach ($logEntries as $index => $entry) {
            $movies[] = [
                'code' => (string) $currentCode, // 136, 137, 138, ... ketma-ket
                'channel_id' => env('TELEGRAM_CHANNEL_USERNAME', '@KinolarOlami'),
                'message_id' => $entry['message_id'],
                'file_id' => $entry['file_id'],
                'views' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
            $currentCode++;
        }

        // Database ga qo'shish
        DB::table('movies')->insert($movies);

        $this->command->info(count($movies) . ' ta kino seed qilindi!');
        
        // Ekranga chiqarish uchun ma'lumot
        foreach ($movies as $index => $movie) {
            $this->command->line(($index + 1) . ". Code: {$movie['code']} - File ID: {$movie['file_id']} - Message ID: {$movie['message_id']}");
        }
        
        $this->command->info('Kodlar 136 dan boshlab ' . ($currentCode - 1) . ' gacha');
    }
}