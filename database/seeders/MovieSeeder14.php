<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Movie;

class MovieSeeder14 extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $channelId = "-1003605893088";

        $movies = [
            [
                'code' => '2058',
                'name' => 'Honest Thief (Subtitle)',
                'message_id' => 478,
                'file_id' => 'BAACAgQAAyEFAATg_EcvAANmabrHzPJn0Qa6dFA2kLBaRWYt3gwAAuIHAAKJdqBSxVLtVtlpd9w6BA',
            ],
            [
                'code' => '2059',
                'name' => 'The Man from Toronto (Subtitle)',
                'message_id' => 479,
                'file_id' => 'BAACAgIAAyEFAATg_EcvAANnabrHzOVyy0GvTQO_XXDOcXywegADMRcAAh3UwUl3Z9Bs8P1EozoE',
            ],
            [
                'code' => '2060',
                'name' => 'Pirates Of The Caribbean 1 (Subtitle)',
                'message_id' => 480,
                'file_id' => 'BAACAgIAAyEFAATg_EcvAANoabrHzLowu9cqmvDuZ3T3_b-wAV4AAngHAAI9cGFJ1btuUBvcWmo6BA',
            ],
            [
                'code' => '2061',
                'name' => 'Pirates Of The Caribbean 2 (Subtitle)',
                'message_id' => 481,
                'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIB4Wm6zCR8upcGa0cI4nejdNcXY4kkAAKABwACPXBhSR3QLfocIIu_OgQ',
            ],
            [
                'code' => '2062',
                'name' => "Pirates of the Caribbean 3 (Subtitle)",
                'message_id' => 482,
                'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIB4mm6zCTdXkwQKsFjhZ9Ir0Bj2AOyAAKDBwACPXBhSRc4pu-wXhXSOgQ',
            ],
            [
                'code' => '2063',
                'name' => 'Pirates of the Caribbean 4 (Subtitle)',
                'message_id' => 483,
                'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIB42m6zCScvQuoEsrw4C6jj9u7apjGAAKIBwACPXBhSYGoJyC1ZrZSOgQ',
            ],
            [
                'code' => '2064',
                'name' => 'Pirates of the Caribbean 5 (Subtitle)',
                'message_id' => 484,
                'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIB5Gm6zCSGMSueWZx7_WcDVyDNtQiqAAJnCQACmVpISJDnIA4kz8OCOgQ',
            ],
            [
                'code' => '2065',
                'name' => 'SNIPER: Ultimate Kill (Subtitle)',
                'message_id' => 485,
                'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIB5Wm6zCSTBpCoY2DVa3tpKfU_s4w8AAIgCQAC8NRJSPI4C7gY-d3bOgQ',
            ],
            [
                'code' => '2066',
                'name' => 'Baby Driver (Subtitle)',
                'message_id' => 486,
                'file_id' => 'BAACAgQAAyEFAATW7Y_gAAIB5mm6zCTyul6Sq8tTuYIKzY0md-3BAAKxCQACp-VgUV9jYmBYIfJZOgQ',
            ],
            [
                'code' => '2067',
                'name' => 'Godzilla 1 (Subtitle)',
                'message_id' => 487,
                'file_id' => 'BAACAgQAAyEFAATW7Y_gAAIB52m6zCQErqxxO-3glWY6kEefVZc8AAJHBwACZSsBU7WnmwEu0RwvOgQ',
            ],
            [
                'code' => '2068',
                'name' => 'Godzilla 2 (Subtitle)',
                'message_id' => 488,
                'file_id' => 'BAACAgQAAyEFAATW7Y_gAAIB6Gm6zCSGBoDnDr45hjSoImZkEGREAAK7CAAC4f4AAVNdyH_Xwjpb9DoE',
            ],
            [
                'code' => '2069',
                'name' => 'Gifted (Subtitle)',
                'message_id' => 489,
                'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIB6Wm6zCRk6JF9Zfj10p8atojFG_-dAAI7CAAC-x5wS6wE409zCH3sOgQ',
            ],
            [
                'code' => '2070',
                'name' => 'Agent Ava (Subtitle)',
                'message_id' => 490,
                'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIB6mm6zCQpnKhKLk5VChbH3wuTgj7cAAL7CgAC13sxSiZsePauEJk6OgQ',
            ],
            [
                'code' => '2071',
                'name' => 'IT (Subtitle)',
                'message_id' => 491,
                'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIB62m6zCSEyG-pnJgiROPstQwbVz7VAALaCgACx1tBSfjkWiufIuxrOgQ',
            ],
            [
                'code' => '2072',
                'name' => 'John Wick 1 (Subtitle)',
                'message_id' => 492,
                'file_id' => 'BAACAgQAAyEFAATW7Y_gAAIB7Gm6zCTSbfMmuexaGpbMSl7y30lOAAKOBwAC7alIURooAscudiTuOgQ',
            ],
            [
                'code' => '2073',
                'name' => 'Sense and Sensibility (1995) (Subtitle)',
                'message_id' => 493,
                'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIB7Wm6zCTVKtnI4I8GeHVT-w31l7DoAAJ4CAACMeexSNa2Y6f-bAf_OgQ',
            ],
            [
                'code' => '2074',
                'name' => 'The Mask (Subtitle)',
                'message_id' => 494,
                'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIB7mm6zCSmWrDM-f3Esft8AAElRlf5aQACAggAAonNIEm0CrdhEoXlEjoE',
            ],
            [
                'code' => '2075',
                'name' => 'Pride and Prejudice (Subtitle)',
                'message_id' => 495,
                'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIB72m6zCRKKMAa1sRe-NtMC_Kg2zDKAAJECAACNbNBS3AAAS_AQyo9UzoE',
            ],
            [
                'code' => '2076',
                'name' => 'I Still Believe (Subtitle)',
                'message_id' => 496,
                'file_id' => 'BAACAgQAAyEFAATW7Y_gAAIB8Gm6zCTBKrSDaZDeYsO_1FkrZzikAAKYBgAC77YxU18x-u2lj8APOgQ',
            ],
            [
                'code' => '2077',
                'name' => 'Lord of rings (Subtitle)',
                'message_id' => 497,
                'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIB8Wm6zCRZgDxe1DaSaTvh9x2JnbqUAALsCAAC_lOYSWRQD0PWlXV-OgQ',
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
