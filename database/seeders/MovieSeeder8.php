<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Movie;
use Illuminate\Support\Carbon;

class MovieSeeder8 extends Seeder
{
    public function run()
    {
        $movies = [
            [
                'code' => '169',
                'name' => "Ma'budlar qissasi",
                'channel_id' => config('telegram.channel_username', '@kinomed1aa'),
                'message_id' => 326,
                'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBRmmijm_GsX6jxeMv4n98zWXhTUWJAALflgACcaIJSf0r9b-tR8nhOgQ',
                'views' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'code' => '170',
                'name' => 'Askar / Javan',
                'channel_id' => config('telegram.channel_username', '@kinomed1aa'),
                'message_id' => 327,
                'file_id' => 'BAACAgQAAyEFAATW7Y_gAAIBR2mim1-3W5Yk8dQi1ikFtOWsFsfXAAI0EQACu2lZUnzGp9S26PrGOgQ',
                'views' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'code' => '171',
                'name' => "G'irrom o'yin",
                'channel_id' => config('telegram.channel_username', '@kinomed1aa'),
                'message_id' => 328,
                'file_id' => 'BAACAgQAAyEFAATW7Y_gAAIBSGmim1_8stjoY6XEfsi9ScCfTegiAAL-FgACObBZU1XWdmcCbNCjOgQ',
                'views' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        foreach ($movies as $movie) {
            Movie::firstOrCreate(
                ['code' => $movie['code']],
                collect($movie)->except(['code', 'created_at', 'updated_at'])->toArray()
            );
        }

        $this->command->info(count($movies) . ' ta kino seed qilindi!');
        $this->command->info(str_repeat('-', 50));

        foreach ($movies as $movie) {
            $this->command->line(
                "Kod: {$movie['code']} | Nomi: {$movie['name']} | Message ID: {$movie['message_id']}"
            );
        }

        $this->command->info(str_repeat('-', 50));
        $this->command->info('Seeder muvaffaqiyatli bajarildi ✅');
    }
}
