<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Serial;
use App\Models\SerialEpisode;
use App\Models\Movie;

class WednesdayS1Seeder extends Seeder
{
    public function run()
    {
        $serialName = "Wednesday (Season 1)";
        $channelId = "-1003605893088";
        $lang = 'en';

        // Check if serial exists, set its language
        $serial = Serial::firstOrCreate(['name' => $serialName]);
        $serial->language = $lang;
        $serial->save();

        $episodes = [
            [
                'ep' => 1,
                'code' => '2083',
                'msg_id' => 514,
                'file_id' => 'BAACAgIAAxkBAAIX5WnKF8CET3gT42yaKP3WjgOyIne0AALXkgACwl3RSX3Z6pcP-u2UOgQ'
            ],
            [
                'ep' => 2,
                'code' => '2084',
                'msg_id' => 515,
                'file_id' => 'BAACAgIAAxkBAAIX5mnKF8D6WCuwrdct77artO-Cc_jWAALkmgACwl3ZSakqqpMrT-VtOgQ'
            ],
            [
                'ep' => 3,
                'code' => '2085',
                'msg_id' => 516,
                'file_id' => 'BAACAgIAAxkBAAIX52nKF8CxPEcXG5S0-PyPCMxih4P-AAL0mgACwl3ZSfwBXtravgy7OgQ'
            ],
            [
                'ep' => 4,
                'code' => '2086',
                'msg_id' => 517,
                'file_id' => 'BAACAgIAAxkBAAIX6GnKF8DYhtJ5at4fkXhP4-JN_0KYAAIOmwACwl3ZSdQ95ToMaomCOgQ'
            ],
            [
                'ep' => 5,
                'code' => '2087',
                'msg_id' => 518,
                'file_id' => 'BAACAgIAAxkBAAIX6WnKF8DEWpvkc3_N0H0ht_wRCoJ5AAJJngACwl3ZSW9knIm9IEjcOgQ'
            ],
            [
                'ep' => 6,
                'code' => '2088',
                'msg_id' => 519,
                'file_id' => 'BAACAgIAAxkBAAIX6mnKF8CYxsRd3wABx4OusLCslGCgBAACSp4AAsJd2UlwSrybvmmANjoE'
            ],
            [
                'ep' => 7,
                'code' => '2089',
                'msg_id' => 520,
                'file_id' => 'BAACAgIAAxkBAAIX62nKF8CZzrybeTasV6K29_HuFxGWAAJPngACwl3ZSXjEZRt1xD_nOgQ'
            ],
            [
                'ep' => 8,
                'code' => '2090',
                'msg_id' => 521,
                'file_id' => 'BAACAgIAAxkBAAIX7GnKF8CY0bdu6emcHnf450qtmBx_AAJQngACwl3ZScdr2w3hR42VOgQ'
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

