<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Movie;

class MovieSeeder13 extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $channelId = "-1003605893088";

        $movies = [
            [
                'code' => '3000',
                'name' => 'ПЕРЕНЕСЕМСЯ В БУДУЩЕЕ НА 50 ЛЕТ ВПЕРЕД!',
                'message_id' => 470,
                'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIB1mm480WKf_2M6pmYm90LM0dHEgfUAAKyPwACfyFASJIgYAwCiKlbOgQ',
            ],
            [
                'code' => '3019',
                'name' => 'Космос. Смерть. Роботы / Cosmic Chaos.',
                'message_id' => 471,
                'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIB12m480UBrWOS6O9xFFCYCcuNlLRCAAJBNAACgsmISxL9w5aN797UOgQ',
            ],
            [
                'code' => '3017',
                'name' => 'Вондервелл',
                'message_id' => 472,
                'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIB2Gm480WlPNcRIevBaSVmzrRmI5vIAAJzNwACZg4hS9RhI5dfG8gtOgQ',
            ],
            [
                'code' => '3018',
                'name' => "Yo'lbars 3",
                'message_id' => 473,
                'file_id' => 'BAACAgUAAyEFAATW7Y_gAAIB2Wm480VQIDkX6jZenuLcNQJkbyQdAAKQDQAC6dSwVjCXXNrzDDtKOgQ',
            ],
            [
                'code' => '3020',
                'name' => 'Снайпер оружие возмездия.',
                'message_id' => 474,
                'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIB2mm480VrXwzj4ixKDKOPmtbKrtqFAAJGQwACQTC5SHsAAU_jAaHjwToE',
            ],
            [
                'code' => '3021',
                'name' => 'Бегущий в лабиринте: Испытание огнем (2015)',
                'message_id' => 475,
                'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIB22m480Ub0o-EOw8x0Vj_NF2TsLgoAAKqLwACdQ_YSl0WVw6raudBOgQ',
            ],
            [
                'code' => '3022',
                'name' => 'Странный Томас (2013)',
                'message_id' => 476,
                'file_id' => 'BAACAgQAAyEFAATW7Y_gAAIB3Gm480WbQSd0snKl-ibYgz3AwixjAAKoBwACSWRQUQz4fupNUv7bOgQ',
            ],
            [
                'code' => '2000',
                'name' => 'X-Men - First Class (Subtitle)',
                'message_id' => 451,
                'file_id' => 'BAACAgQAAyEFAATW7Y_gAAIBw2m47fApsnEueBQ9llBKGtCSUU0SAAJVBgACgeUhUnReB6lfk_aXOgQ',
            ],
            [
                'code' => '2056',
                'name' => 'Valentine DayZ',
                'message_id' => 452,
                'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBxGm47fCG6V-SOZHJlxrrfYhkDmZgAAIgLAACbwsJSQxnTTyojhB0OgQ',
            ],
            [
                'code' => '2057',
                'name' => 'Scarescrows',
                'message_id' => 453,
                'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBxWm47fDs2CEEODKfWRuS3DyIQcB9AAKLHQACSum5SC5GwJmvKoqiOgQ',
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
