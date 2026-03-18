<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Movie;

class MovieRusSeeder15 extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $channelId = "-1003605893088";

        $movies = [
            [
                'code' => '3022',
                'name' => 'Небесный огонь (Rus)',
                'message_id' => 498,
                'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIB8mm64wQOAaNTsLSx52wvOw2vRwJVAAKpJQACSM04SCcD3FfEp_cUOgQ',
            ],
            [
                'code' => '3023',
                'name' => 'Rayon (Rus)',
                'message_id' => 499,
                'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIB82m64wQnRMufETbvoahGhjQJdZA3AAJ1HAACzQGoSAQ7aRwpoqrROgQ',
            ],
            [
                'code' => '3024',
                'name' => 'Гранит (Rus)',
                'message_id' => 500,
                'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIB9Gm64wQWXQHQsxW7PPGPP0pWbiy_AAKlHgACQIvwSY_uUFUDOb5VOgQ',
            ],
            [
                'code' => '3025',
                'name' => 'Алые Паруса (Rus)',
                'message_id' => 501,
                'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIB9Wm64wRTXCmnp4k1JCV4pIGz5-dzAALKOwACNXZgS0UMX9XKtme0OgQ',
            ],
            [
                'code' => '3026',
                'name' => 'Земля перезагрузка (Rus)',
                'message_id' => 502,
                'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIB9mm64wQbYBhJbwklWCfIdTBoZsUKAAKjNgACrqQZS4LrrMrBd82qOgQ',
            ],
            [
                'code' => '3027',
                'name' => 'Способность (Rus)',
                'message_id' => 503,
                'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIB92m64wQUahFFat_KyLBVThwvk2KxAAL4MgACWagJSlv7AAFnGVGpHjoE',
            ],
            [
                'code' => '3028',
                'name' => '13 Район (Rus)',
                'message_id' => 504,
                'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIB-Gm64wQERhV2tR_v2Ka927ztq6AyAALgGAACTZ94SrMynzpgzG7GOgQ',
            ],
            [
                'code' => '3029',
                'name' => 'Рэкетир (Rus)',
                'message_id' => 505,
                'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIB-Wm64wTlMWskjvoZ_Mde4e1WkuT7AALwEAACkhtJSotr5xCSgxvGOgQ',
            ],
            [
                'code' => '3030',
                'name' => 'ПОЛКОВНИК СПЕЦНАЗА ПОПАДАЕТ В БОЛЬШУЮ ПЕРЕДЕЛКУ! (Rus)',
                'message_id' => 506,
                'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIB-mm64wRPLxwGE2dnUgEsVHuQ__POAAI6OQACMZ9JSnIuBTLI3z6KOgQ',
            ],
            [
                'code' => '3031',
                'name' => 'Компьютерная игра становится реальностью (Rus)',
                'message_id' => 507,
                'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIB-2m64wR0Vgx06uIzoVKEjbFp1ObSAAKfPgACP4fpSPEvviQN5HNMOgQ',
            ],
            [
                'code' => '3032',
                'name' => 'Плохие парни (Rus)',
                'message_id' => 508,
                'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIB_Gm64wTV05fwoOI8VXZleO3cH7KPAAKpPAACjrCBSLGJLbA2ECNYOgQ',
            ],
            [
                'code' => '3033',
                'name' => 'Последняя битва (Rus)',
                'message_id' => 509,
                'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIB_Wm64wT6HytHEGxI5C8Ev7qg4-3YAAI-MgACArUpS05NvhXqaZrjOgQ',
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
