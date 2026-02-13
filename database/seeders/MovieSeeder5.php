<?php
// database/seeders/MovieSeeder4.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class MovieSeeder5 extends Seeder
{
    public function run()
    {
        $movies = [];

        // Kodlar 142 dan boshlanadi
        $startCode = 142;

        // Logdan olingan videolar
        $logEntries = [
            [
                'file_id' => 'BAACAgQAAyEFAATW7Y_gAAIBMWmPRrkhhfwsu9GRrjybOhZ8rpUYAAJHFAAC-L6QU1VEhYFuE6SSOgQ',
                'message_id' => 305,
                'title' => 'Parijdagi akula 720p',
                'code' => 144
            ],
            [
                'file_id' => 'BAACAgEAAyEFAATW7Y_gAAIBMmmPRrk7lkDsDMg6B_XYTKhgsYLJAAJeAANV7JhHWB_TmqdZ5VE6BA',
                'message_id' => 306,
                'title' => 'Irlandiyalik 2019',
                'code' => 143
            ],
            [
                'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBM2mPRrkqbRNVWUVRi3vcya4NyyO2AAKMjwACEgtpSHynwsb4Gs8dOgQ',
                'message_id' => 307,
                'title' => 'Jigar 3',
                'code' => 142
            ],
            [
                'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBNGmPSMwlM_Vye1G5fOb7u3UvrQ4_AAKekAACX_xwSDbY4Py6uLGjOgQ',
                'message_id' => 308,
                'title' => 'Noma\'lum film',
                'code' => 145
            ],
        ];

        $currentCode = $startCode;

        foreach ($logEntries as $index => $entry) {
            // Film nomidan code ni aniqlaymiz (agar mavjud bo'lsa)
            $code = $entry['code'] ?? $currentCode;
            
            $movies[] = [
                'code' => (string) $code,
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
        $this->command->info('Kodlar oralig\'i: 142 - 145');

        $this->command->info("\nQo'shilgan kinolar:");
        $this->command->info(str_repeat('-', 50));
        
        foreach ($movies as $index => $movie) {
            $title = $logEntries[$index]['title'] ?? 'Noma\'lum film';
            $this->command->line(
                sprintf(
                    "Kod: %s | Film: %s | Message ID: %s",
                    str_pad($movie['code'], 3, ' ', STR_PAD_LEFT),
                    str_pad($title, 20, ' '),
                    $movie['message_id']
                )
            );
        }
        
        $this->command->info(str_repeat('-', 50));
        $this->command->info('File ID lari:');
        
        foreach ($movies as $index => $movie) {
            $this->command->line("{$movie['code']}: {$movie['file_id']}");
        }
    }
}