<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Serial;
use App\Models\SerialEpisode;
use App\Models\Movie;

class ZolotayaLojhkaSeeder extends Seeder
{
    public function run()
    {
        $serialName = "Золотая ложка (Rus)";
        $channelId = "-1003605893088";
        $lang = 'ru';

        // Check if serial exists, set its language
        $serial = Serial::firstOrCreate(['name' => $serialName]);
        $serial->language = $lang;
        $serial->save();

        $episodes = [
            ['ep' => 1, 'code' => '3001', 'msg_id' => 454, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBxmm480X3vcDcgnRgojcOv-3Kl0BmAAJjGwAC492pSbYIEIrx_f6JOgQ'],
            ['ep' => 2, 'code' => '3002', 'msg_id' => 455, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBx2m480W2AsOxGBl0DXr_kk2NtUvIAALUHAAC492xSbtm_KbC0igIOgQ'],
            ['ep' => 3, 'code' => '3003', 'msg_id' => 456, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIByGm480VsCWWSFDYWeKOqcW6Z03X_AAIEHQACwdDBScFS1CA-qKuQOgQ'],
            ['ep' => 4, 'code' => '3004', 'msg_id' => 457, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIByWm480XvnIbDU60_6wHks3cvEAzQAAKQIQACHnnQSaUdquTI2sv9OgQ'],
            ['ep' => 5, 'code' => '3005', 'msg_id' => 458, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBymm480VZiiOlZVdDrn3Cv6xQpnnbAAJFHQACHQMJSqAKRLEU8cIlOgQ'],
            ['ep' => 6, 'code' => '3006', 'msg_id' => 459, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBy2m480XbcryBdktEauhjkrhQpFxRAALoHgACz-ogSsJ8O5PVltLfOgQ'],
            ['ep' => 7, 'code' => '3007', 'msg_id' => 460, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBzGm480Vp5b2ysfeLDvbA-boniwZEAAKIHwACMT1ZSmRi0DgWvFigOgQ'],
            ['ep' => 8, 'code' => '3008', 'msg_id' => 461, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBzWm480U0_2D7CBa6IK4zTnyi7wT4AAINJAACMT1hSirQLy-9QmomOgQ'],
            ['ep' => 9, 'code' => '3009', 'msg_id' => 462, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBzmm480WqnuKmNI_d-EAuZiutgJ7tAALfJQACsgWoSmfu0cLhBbi4OgQ'],
            ['ep' => 10, 'code' => '3010', 'msg_id' => 463, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBz2m480Xy34OsduJyA7lSWrRkMFX-AAIjHwACc5_BSr9q0SE68DA6OgQ'],
            ['ep' => 11, 'code' => '3011', 'msg_id' => 464, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIB0Gm480Wvc4bWIMi6Yj1v8N0ofqXlAAJrIQACKQE4S0iVci6tsmRpOgQ'],
            ['ep' => 12, 'code' => '3012', 'msg_id' => 465, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIB0Wm480UGF9meLn6INELYKQQ7bLl-AAKJIQACKQE4S10RAyj-f_ADOgQ'],
            ['ep' => 13, 'code' => '3013', 'msg_id' => 466, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIB0mm480Ud80VqE55zCZJA9AimooVfAALtIQACKQE4S0wDHsJqhQV7OgQ'],
            ['ep' => 14, 'code' => '3014', 'msg_id' => 467, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIB02m480Wy_WLyUYiRB7VToDhaR6mGAAJUIgACzl9YSwstOpZLKkzUOgQ'],
            ['ep' => 15, 'code' => '3015', 'msg_id' => 468, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIB1Gm480Wt8I4OqpIQ7l2AvvyfMNPUAAMeAAKi9YBLf5VV7Fkjn5E6BA'],
            ['ep' => 16, 'code' => '3016', 'msg_id' => 469, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIB1Wm480V_YQgKnEWPIVGLRK0BxdKrAALfHgACovWISy_iY5qbsncrOgQ'],
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
