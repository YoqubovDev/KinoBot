<?php
// database/seeders/MovieSeeder6.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class MovieSeeder6 extends Seeder
{
    public function run()
    {
        $movies = [];

        // Kodlar 156 dan boshlanadi
        $startCode = 156;

        // Logdan olingan videolar (siz yuborgan 3 ta)
        $logEntries = [
            [
                'file_id' => 'BAACAgQAAyEFAATW7Y_gAAIBQGmWc3Ou5HnjBTCF9VMV_aKgVxXGAALmFwACjNRQURvC49MyhBS6OgQ',
                'message_id' => 320,
                'title' => 'Yetimlar (2012)',
            ],
            [
                'file_id' => 'BAACAgIAAyEFAATg_EcvAAMjaZZzPCUz12620ky7UHmfUXTt5fgAAtpFAAKXrnhIX_vnT1DSEGc6BA',
                'message_id' => 321,
                'title' => 'To‘liq film (Botga joylangan)',
            ],
            [
                'file_id' => 'BAACAgQAAyEFAATg_EcvAAMkaZZzPFNkcphfUWer-SyQyAXG49AAAr8cAAIee2BTXGxY9T7TfmE6BA',
                'message_id' => 322,
                'title' => 'Narniya saltanati 1',
            ],
        ];

        $currentCode = $startCode;

        foreach ($logEntries as $entry) {

            $movies[] = [
                'code' => (string) $currentCode,
                'channel_id' => env('TELEGRAM_CHANNEL_USERNAME', '@kinomed1aa'),
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
        $this->command->info('Kodlar oralig\'i: 156 - 158');

        $this->command->info("\nQo'shilgan kinolar:");
        $this->command->info(str_repeat('-', 60));

        foreach ($movies as $index => $movie) {
            $title = $logEntries[$index]['title'];
            $this->command->line(
                sprintf(
                    "Kod: %s | Film: %s | Message ID: %s",
                    str_pad($movie['code'], 3, ' ', STR_PAD_LEFT),
                    str_pad($title, 30, ' '),
                    $movie['message_id']
                )
            );
        }

        $this->command->info(str_repeat('-', 60));
        $this->command->info('File ID lari:');

        foreach ($movies as $movie) {
            $this->command->line("{$movie['code']} => {$movie['file_id']}");
        }
    }
}
