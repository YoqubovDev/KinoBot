<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class GassolSeeder extends Seeder
{
    public function run()
    {
        $now = Carbon::now();

        $movies = [
            [
                'code' => '146',
                'channel_id' => '-1003605893088',
                'message_id' => 309,
                'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBNWmRunxk4iKx7NwylhS2LqrB6kfHAAKjkgAC6U6JSIHHpEHI_1EHOgQ',
            ],
            [
                'code' => '147',
                'channel_id' => '-1003605893088',
                'message_id' => 311,
                'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBN2mRunxoW3wUpORjqmKTgzFwq21iAAIZlgAC6U6JSJeYMq8fpOTGOgQ',
            ],
            [
                'code' => '148',
                'channel_id' => '-1003605893088',
                'message_id' => 312,
                'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBNmmRuny1harg_ALY1uKecf8wEGpIAAKxkgAC6U6JSHAXP98ILxGBOgQ',
            ],
            [
                'code' => '149',
                'channel_id' => '-1003605893088',
                'message_id' => 313,
                'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBOWmRuqe6X_MZmCeMB4K2O2nX37qKAAIalgAC6U6JSLiH5PEYXEo7OgQ',
            ],
            [
                'code' => '150',
                'channel_id' => '-1003605893088',
                'message_id' => 314,
                'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBOmmRuqfvzT6gZ0hl7LtsyJ1khVT_AAIclgAC6U6JSI6qDSiU0-iwOgQ',
            ],
            [
                'code' => '151',
                'channel_id' => '-1003605893088',
                'message_id' => 315,
                'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBO2mRuqelxmAaIzZFD7TF_GYQXoFUAAIelgAC6U6JSNzpkPQ_Oys1OgQ',
            ],
            [
                'code' => '152',
                'channel_id' => '-1003605893088',
                'message_id' => 316,
                'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBPGmRuqfrFefrkMlO64NeQK7MDG05AAIflgAC6U6JSA7wvE-kpSNfOgQ',
            ],
            [
                'code' => '153',
                'channel_id' => '-1003605893088',
                'message_id' => 317,
                'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBPWmRuqdQPfuM_9Pxge4Y3iuOfHi8AAIhlgAC6U6JSBFt31Xm8f2QOgQ',
            ],
            [
                'code' => '154',
                'channel_id' => '-1003605893088',
                'message_id' => 318,
                'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBPmmRuqdl2pUOT74AAZ4SU0nThIPFQQACJJYAAulOiUjBpfQH-6-s0ToE',
            ],
            [
                'code' => '155',
                'channel_id' => '-1003605893088',
                'message_id' => 319,
                'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBP2mRuqcBwVFzm9MY2IfWVlbHoM41AAIolgAC6U6JSGtHuXIn-eSQOgQ',
            ],
        ];

        foreach ($movies as &$movie) {
            $movie['views'] = 0;
            $movie['created_at'] = $now;
            $movie['updated_at'] = $now;
        }

        DB::table('movies')->insert($movies);

        $this->command->info("G'assol serialidan " . count($movies) . " ta qism qo'shildi.");
        $this->command->info("Kodlar: 146 → 155");
    }
}
