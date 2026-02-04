<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MovieSeeder2 extends Seeder
{
    public function run(): void
    {
        DB::table('movies')->insert([
            'code' => '102',
            'channel_id' => '@kino_channel',
            'message_id' => null,
            'file_id' => 'BAACAgQAAxkBAAMpaYI5O0J47UF2r3Taw5U-c5DDTKYAAv8PAAKpMplRdZRUcVJGiys4BA',
            'views' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
