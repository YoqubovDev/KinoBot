<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class MovieSeeder10 extends Seeder
{
    public function run()
    {
        $movies = [
            [
                'code' => '184',
                'name' => "Ma'budlar qissasi 2: Iblis bilan jang",
                'channel_id' => env('TELEGRAM_CHANNEL_USERNAME', '@kinomed1aa'),
                'message_id' => 423,
                'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBp2mszsBJKJq6Irh-G7K3gzKuV9KYAAJklQACZqBgScZf0rIfOsiGOgQ',
                'views' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'code' => '185',
                'name' => 'Polaroid',
                'channel_id' => env('TELEGRAM_CHANNEL_USERNAME', '@kinomed1aa'),
                'message_id' => 424,
                'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBqGmszucTJnolLLSrxuLpKFfS7D5XAAKLPwACtYlhSiwoiFrTRJSmOgQ',
                'views' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'code' => '186',
                'name' => 'Davom et / Sen haydaysan',
                'channel_id' => env('TELEGRAM_CHANNEL_USERNAME', '@kinomed1aa'),
                'message_id' => 425,
                'file_id' => 'BAACAgQAAyEFAATW7Y_gAAIBqWmszucrr9SeH7eeUZaSxZp0kwM4AAJ8EQAC1ScBU-MJSHks-iuHOgQ',
                'views' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'code' => '187',
                'name' => 'Jasur',
                'channel_id' => env('TELEGRAM_CHANNEL_USERNAME', '@kinomed1aa'),
                'message_id' => 426,
                'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBqmms0Bfa9XgdWvKbZCMMU4WFE5D4AAKGdAAC1cABSUJHE-mf2O_0OgQ',
                'views' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        DB::table('movies')->insert($movies);

        $this->command->info(count($movies) . ' ta yangi kino seed qilindi!');
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
