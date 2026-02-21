<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class MovieSeeder7 extends Seeder
{
    public function run()
    {
        $movies = [

            [
                'code' => '160',
                'channel_id' => env('TELEGRAM_CHANNEL_USERNAME', '@kinomed1aa'),
                'message_id' => 323,
                'file_id' => 'BAACAgQAAyEFAATW7Y_gAAIBQ2mZDuceUdvWzb_RIV_YLctO8sjsAAKyCQAC_9jAUfGmj90lQuIxOgQ',
                'views' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'code' => '159',
                'channel_id' => env('TELEGRAM_CHANNEL_USERNAME', '@kinomed1aa'),
                'message_id' => 324,
                'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBRGmZDuda5SDi2smydRm3waE9BG1PAALYQgACkmdQS_i6AAF1RKWc9joE',
                'views' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

        ];

        DB::table('movies')->insert($movies);

        $this->command->info(count($movies) . ' ta kino seed qilindi!');
        $this->command->info(str_repeat('-', 50));

        foreach ($movies as $movie) {
            $this->command->line(
                "Kod: {$movie['code']} | Message ID: {$movie['message_id']}"
            );
        }

        $this->command->info(str_repeat('-', 50));
        $this->command->info('Seeder muvaffaqiyatli bajarildi ✅');
    }
}