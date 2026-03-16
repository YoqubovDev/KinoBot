<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class MovieSeeder12 extends Seeder
{
    public function run()
    {
        $movies = [
            [
                'code' => '195',
                'name' => 'Jarlik / Dara / Tepalik',
                'channel_id' => '-1003605893088',
                'message_id' => 445,
                'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBvWm4Q_MqzH9HpHtM9CYIYSUV_vacAALvmwACFlW4SasGYoOiyJzaOgQ',
                'views' => rand(200, 300),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'code' => '196',
                'name' => 'Qurbon',
                'channel_id' => '-1003605893088',
                'message_id' => 447,
                'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBvmm4RBV4bYgxSaBGfHEHqlvDT9BlAALKngAC9EZxSaIi47RoUh5SOgQ',
                'views' => rand(200, 300),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'code' => '197',
                'name' => 'Jang ortidan jang',
                'channel_id' => '-1003605893088',
                'message_id' => 448,
                'file_id' => 'BAACAgEAAyEFAATW7Y_gAAIBwGm4Smdf3b9j-HtapbvuCm2qQYmtAALZBwAC0C14RWeovur64_GaOgQ',
                'views' => rand(200, 300),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'code' => '198',
                'name' => 'Xaker',
                'channel_id' => '-1003605893088',
                'message_id' => 449,
                'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBwWm4SmeaZHuUe3FtWQNBJyjNd0pSAALAmQACbyLASbcRqf5YbldCOgQ',
                'views' => rand(200, 300),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'code' => '199',
                'name' => 'Maxluqlar Dunyosi',
                'channel_id' => '-1003605893088',
                'message_id' => 450,
                'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBwmm4SmfqNrYjUiS30KMjyrNbucPNAALFmQACbyLASUXxPO0OZm3POgQ',
                'views' => rand(200, 300),
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
