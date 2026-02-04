<?php
// database/seeders/MovieSeeder1.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class MovieSeeder1 extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $movies = [];
        
        // 26 dan boshlab ketma-ket kodlar
        $startCode = 26;

        // Log fayldan olingan ma'lumotlar
        $logEntries = [
            // Birinchi video
            [
                'file_id' => 'BAACAgQAAxkBAANTaYJGtxnJ0sXW_RfPXVVNETHH9s4AAlsUAAL0cUBThoqls-xpKgo4BA',
                'message_id' => 61,
            ],
            // Ikkinchi video
            [
                'file_id' => 'BAACAgIAAxkBAANUaYJGt0BR9Uy3wFqLgtqvZ6o0XWQAAo15AAIZyBBLBJCa6A635ZM4BA',
                'message_id' => 62,
            ],
            // Serial qismlari (1-10 qism)
            [
                'file_id' => 'BAACAgIAAxkBAANVaYJGt8TmW0Ya34XYk0IC9ls9g3MAAix0AALWv3FIoi3wmmKlvGg4BA',
                'message_id' => 64,
            ],
            [
                'file_id' => 'BAACAgIAAxkBAANWaYJGtwpPpAFXoqyACOrnPv8Ih1oAAi10AALWv3FIdn-V6HmwgLM4BA',
                'message_id' => 65,
            ],
            [
                'file_id' => 'BAACAgIAAxkBAANXaYJGt2Om-X8uPO99CtOl5vt2gaEAApx0AALWv3FILaqAtG4kYJk4BA',
                'message_id' => 66,
            ],
            [
                'file_id' => 'BAACAgIAAxkBAANYaYJGt7yIAwsuTlDY69yFyu63L_IAAp10AALWv3FIiBkAAQsr12hVOAQ',
                'message_id' => 67,
            ],
            [
                'file_id' => 'BAACAgIAAxkBAANZaYJGt0PhuYKo7T9q-HZeMv_WO2EAApt0AALWv3FI7B9rPowkTeg4BA',
                'message_id' => 68,
            ],
            [
                'file_id' => 'BAACAgIAAxkBAANaaYJGt6cp5cw3HjmTzm7DbJfGOI4AAp50AALWv3FIrvkiQTY7HZQ4BA',
                'message_id' => 69,
            ],
            [
                'file_id' => 'BAACAgIAAxkBAANbaYJGtxezkpe4Uil5hLk7RKZTPqAAAqB0AALWv3FImRvXJySsrb44BA',
                'message_id' => 70,
            ],
            [
                'file_id' => 'BAACAgIAAxkBAANcaYJGt7lV5cWllZI1-8LZFh5PmpMAAp90AALWv3FIMsmq-mNzXJM4BA',
                'message_id' => 71,
            ],
            [
                'file_id' => 'BAACAgIAAxkBAANdaYJGtxxCKiCtPEBk1rM7s5fj-LQAAqF0AALWv3FIQ7wyWjt4rCY4BA',
                'message_id' => 72,
            ],
            [
                'file_id' => 'BAACAgIAAxkBAANeaYJGt1IDBz50ywUHAAFzE2-J5tpjAAKidAAC1r9xSOEt_fqJ2gqUOAQ',
                'message_id' => 73,
            ],
            // Boshqa kinolar
            [
                'file_id' => 'BAACAgIAAxkBAANgaYJGtwTQYeeJQAayE8BEymyA91UAAlNaAAIyM2FIMwxz6QqwWZo4BA',
                'message_id' => 75,
            ],
            [
                'file_id' => 'BAACAgIAAxkBAANhaYJGt2HvQPiM67UV4Ci3Ax-T0A4AAlxjAALY8AhKaCiR_FVyC3Q4BA',
                'message_id' => 76,
            ],
            [
                'file_id' => 'BAACAgIAAxkBAANiaYJGtxyip2wPBZeFGD6SHMmbW5sAAjQiAAJUGAABSQmaAii5h5qZOAQ',
                'message_id' => 77,
            ],
            [
                'file_id' => 'BAACAgIAAxkBAANjaYJGtwGZUmVcbazJO_MMCc60XD4AAiVMAAKU2aFIbBSrh3t6MdY4BA',
                'message_id' => 78,
            ],
            [
                'file_id' => 'BAACAgIAAxkBAANkaYJGt9T2ZOjN8UGmURMcJMH66jAAAtkPAAKqqxBKIAvd6xHOkqo4BA',
                'message_id' => 79,
            ],
            [
                'file_id' => 'BAACAgQAAxkBAANlaYJGt93SOmkrFJqTsriRyUtVtxoAApIKAAL2IqFQHaXyxfFPueI4BA',
                'message_id' => 80,
            ],
            [
                'file_id' => 'BAACAgIAAxkBAANmaYJGt0w6hsANFDc3b9zy9Z6vNvYAAjlVAAIPaBBI_U5TjOCi0go4BA',
                'message_id' => 81,
            ],
            [
                'file_id' => 'BAACAgIAAxkBAANjaYJGtwGZUmVcbazJO_MMCc60XD4AAiVMAAKU2aFIbBSrh3t6MdY4BA',
                'message_id' => 82,
            ],
            [
                'file_id' => 'BAACAgIAAxkBAANoaYJGt3ubDSGqPRHrRT4RJdm6MaAAAo1QAAJMn9hIbD2tKGIdwig4BA',
                'message_id' => 83,
            ],
            [
                'file_id' => 'BAACAgQAAxkBAANpaYJGt5rKvVhvi7ZXByPaK_n3kegAAtMKAAKFSBBRxh_KxN7veeE4BA',
                'message_id' => 84,
            ],
            [
                'file_id' => 'BAACAgIAAxkBAANqaYJGt8qY1_vIgpWYwmHpTHXph8gAAvgNAALanHhJ8aGk_tw_Pa84BA',
                'message_id' => 85,
            ],
            [
                'file_id' => 'BAACAgIAAxkBAANraYJGt2ZtrN5hVhRd2NroWMb9H14AAjBNAAK1D6lL5ghTl__RPzM4BA',
                'message_id' => 86,
            ],
            [
                'file_id' => 'BAACAgEAAxkBAANsaYJGt2QtrdhQzxbwgfpAcFP4ggsAAm8CAAIe3nlEuTbpmTJVHME4BA',
                'message_id' => 87,
            ],
            [
                'file_id' => 'BAACAgQAAxkBAANtaYJGt9Y9Ux-SrYrk1cNnLVuxmi8AAtgVAAKDMphSfE_dh1zqlCY4BA',
                'message_id' => 88,
            ],
            [
                'file_id' => 'BAACAgIAAxkBAANuaYJGt9qR1ksyQDpij3w7xGX8NjwAAnpnAAJ1z9BIqQsbYgS3nys4BA',
                'message_id' => 89,
            ],
            [
                'file_id' => 'BAACAgIAAxkBAANvaYJGt0L3ZxlrEnsbPXmVzhBiJaAAAjV4AAKswSBJYUivwH8h2xc4BA',
                'message_id' => 90,
            ],
            [
                'file_id' => 'BAACAgIAAxkBAANwaYJGt7s9bR_cxdf2sHu4uNFBmJEAAhiHAAKtnBBIGiTjtEXYR2M4BA',
                'message_id' => 91,
            ],
        ];

        // Har bir video uchun ma'lumotlar
        $currentCode = $startCode;
        foreach ($logEntries as $index => $entry) {
            $movies[] = [
                'code' => (string) $currentCode, // 26, 27, 28, ... ketma-ket
                'channel_id' => env('TELEGRAM_CHANNEL_USERNAME', '@KinolarOlami'),
                'message_id' => $entry['message_id'],
                'file_id' => $entry['file_id'],
                'views' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
            $currentCode++;
        }

        // Database ga qo'shish
        DB::table('movies')->insert($movies);

        $this->command->info(count($movies) . ' ta kino seed qilindi!');
        
        // Ekranga chiqarish uchun ma'lumot
        foreach ($movies as $index => $movie) {
            $this->command->line(($index + 1) . ". Code: {$movie['code']} - File ID: {$movie['file_id']} - Message ID: {$movie['message_id']}");
        }
        
        $this->command->info('Kodlar 26 dan boshlab ' . ($currentCode - 1) . ' gacha');
    }
}