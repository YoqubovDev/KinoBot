<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Serial;
use App\Models\SerialEpisode;
use App\Models\Movie;

class WednesdayS2Seeder extends Seeder
{
    public function run()
    {
        $serialName = "Wednesday (Season 2)";
        $channelId = "-1003605893088";
        $lang = 'en';

        // Check if serial exists, set its language
        $serial = Serial::firstOrCreate(['name' => $serialName]);
        $serial->language = $lang;
        $serial->save();

        $episodes = [
            [
                'ep' => 1,
                'code' => '2078',
                'msg_id' => 4854,
                'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIB_mm64zENrtWYqc1CuouhJ12es6lsAAISeQAC_1uZSGUuAb-GSNjwOgQ'
            ],
            [
                'ep' => 2,
                'code' => '2079',
                'msg_id' => 4855,
                'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIB_2m64zEMcuT5HHSARM-xJIsRfgU6AAIgeQAC_1uZSA99qG6xojIsOgQ'
            ],
            [
                'ep' => 3,
                'code' => '2080',
                'msg_id' => 4856,
                'file_id' => 'BAACAgIAAyEFAATW7Y_gAAICAAFpuuMxZBNuNHht0U8LAAHdb45u3q4AAi55AAL_W5lIG-FwiQKiwnE6BA'
            ],
            [
                'ep' => 4,
                'code' => '2081',
                'msg_id' => 4857,
                'file_id' => 'BAACAgIAAyEFAATW7Y_gAAICAWm64zHZD1N82qdRbzv1RtAaTHFNAAIteQAC_1uZSK9xrYITItT7OgQ'
            ],
        ];

        foreach ($episodes as $ep) {
            $movieName = "{$serialName} {$ep['ep']}-qism";

            Movie::updateOrCreate(
                ['code' => $ep['code']],
                [
                    'name' => $movieName,
                    'file_id' => $ep['file_id'],
                    'message_id' => $ep['msg_id'],
                    'channel_id' => $channelId,
                    'views' => rand(200, 300)
                ]
            );

            SerialEpisode::updateOrCreate(
                [
                    'serial_id' => $serial->id,
                    'episode_number' => $ep['ep'],
                ],
                [
                    'file_id' => $ep['file_id'],
                ]
            );
        }
    }
}
