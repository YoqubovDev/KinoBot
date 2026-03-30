<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Movie;

class MovieSeeder16 extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $channelId = "-1003605893088";

        $movies = [
            [
                'code' => '392',
                'name' => 'Sevgilim Maxluq / Vampir / Thamma',
                'message_id' => 522,
                'file_id' => 'BAACAgIAAxkBAAIX4WnKFtDW8tDTp7RDfpaHzGE7xv0MAAJengACwl3ZSaurkZLsMn84OgQ',
            ],
            [
                'code' => '026',
                'name' => 'Urush mashinasi',
                'message_id' => 526,
                'file_id' => 'BAACAgIAAyEFAATW7Y_gAAICDmnKFM-FgnvBxvNZmG6Kj1lEQKuwAAKXmwACjq1RSmsfzxMdrX0dOgQ',
            ],
        ];

        foreach ($movies as $movieData) {
            Movie::updateOrCreate(
                ['code' => $movieData['code']],
                [
                    'name' => $movieData['name'],
                    'channel_id' => $channelId,
                    'message_id' => $movieData['message_id'],
                    'file_id' => $movieData['file_id'],
                    'views' => rand(100, 500),
                ]
            );
        }
    }
}
