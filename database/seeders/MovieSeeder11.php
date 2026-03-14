<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class MovieSeeder11 extends Seeder
{
    public function run()
    {
        $movies = [
            [
                'code' => '188',
                'name' => 'XUDO ASRASIN',
                'channel_id' => env('TELEGRAM_CHANNEL_USERNAME', '@kinomed1aa'),
                'message_id' => null,
                'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBtWm1NHAFaYTMn2bo_V3Tfg8bgS7hAAKZkQACY86pSWBuWc91Qx6VOgQ',
                'views' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'code' => '189',
                'name' => 'Asira 2020',
                'channel_id' => env('TELEGRAM_CHANNEL_USERNAME', '@kinomed1aa'),
                'message_id' => 439,
                'file_id' => 'BAACAgQAAyEFAATW7Y_gAAIBt2m1Px19TFb_yvDqP3q1-ev9QVFRAAJTDgACs7QoUBxKnBwU63_POgQ',
                'views' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'code' => '190',
                'name' => 'Xatarli kelishuv',
                'channel_id' => env('TELEGRAM_CHANNEL_USERNAME', '@kinomed1aa'),
                'message_id' => 440,
                'file_id' => 'BAACAgQAAyEFAATW7Y_gAAIBuGm1Px1NJhe4LgWVMFjzrsG7tJ7_AAIREgACSoy5UCma4VTHqCYgOgQ',
                'views' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'code' => '191',
                'name' => 'FARISHTALAR SHAHRI',
                'channel_id' => env('TELEGRAM_CHANNEL_USERNAME', '@kinomed1aa'),
                'message_id' => 441,
                'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBuWm1Px3qZvoMlxw-LtoQ1WpjR8wlAALuGQACww4QS4aEZTmY-TytOgQ',
                'views' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'code' => '192',
                'name' => 'Ong osti kuchlari',
                'channel_id' => env('TELEGRAM_CHANNEL_USERNAME', '@kinomed1aa'),
                'message_id' => 442,
                'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBumm1Px0CvFOSOaNkM4AhR5ZWPLiPAAIxdAACrcnhSZNR6ptB3uM-OgQ',
                'views' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'code' => '193',
                'name' => 'Echki hayoti b/f',
                'channel_id' => env('TELEGRAM_CHANNEL_USERNAME', '@kinomed1aa'),
                'message_id' => 443,
                'file_id' => 'BAACAgUAAyEFAATW7Y_gAAIBu2m1Px1WF_2-ZYvWo3xdkhat7apJAAI1EwACi69RVK6y1zwRN8xcOgQ',
                'views' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'code' => '194',
                'name' => 'Tunda Aytilgan Qoʼrqinchli Ertaklar',
                'channel_id' => env('TELEGRAM_CHANNEL_USERNAME', '@kinomed1aa'),
                'message_id' => 444,
                'file_id' => 'BAACAgQAAyEFAATW7Y_gAAIBvGm1Px0dYAFSnSkh4a3YyXhMRbZZAAKHEgACd8TIUL3sBAABVbiQOToE',
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
