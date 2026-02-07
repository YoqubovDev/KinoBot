<?php
// database/seeders/MovieSeederFromLog.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class MovieSeederFromLog extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $movies = [];
        
        // Log ma'lumotlarini qayta ishlash
        $logData = [
            // Code 54
            [
                'code' => '54',
                'file_id' => 'BAACAgIAAxkBAAPcaYbXzQz9UfSClpi24gPFOidbU3cAAhiHAAKtnBBIGiTjtEXYR2M6BA',
                'message_id' => 91,
            ],
            // Code 55
            [
                'code' => '55',
                'file_id' => 'BAACAgIAAxkBAAPdaYbXzR9-_m7P2vXHO75Kp5KcFCUAApFrAAI1SMlIUW6XWRQF0VI6BA',
                'message_id' => 92,
            ],
            // Jumong seriali qismlari
            [
                'code' => '56',
                'file_id' => 'BAACAgIAAxkBAAPeaYbXzYr_4nypHlTD-JmvmAo8ynQAApwRAAKYhVBI7UL00cm2NLA6BA',
                'message_id' => 93,
            ],
            [
                'code' => '57',
                'file_id' => 'BAACAgIAAxkBAAPfaYbXzXBpoRClTT-9oMGwQX6JRdMAAqARAAKYhVBIxV2MOEm4WIQ6BA',
                'message_id' => 94,
            ],
            [
                'code' => '58',
                'file_id' => 'BAACAgIAAxkBAAPgaYbXzepGVwABeJjnig2EfvFfjxOCAAKhEQACmIVQSEJMb3VUJjEJOgQ',
                'message_id' => 95,
            ],
            [
                'code' => '59',
                'file_id' => 'BAACAgIAAxkBAAPhaYbXzaoyPKcw1mbo3Winf4nv8xYAAqMRAAKYhVBI3fegz7vsxPM6BA',
                'message_id' => 96,
            ],
            [
                'code' => '60',
                'file_id' => 'BAACAgIAAxkBAAPiaYbXzTaLWcTZxBKBTajOuCFRBIcAAjYKAAIik0lLmI69Ty0fuWc6BA',
                'message_id' => 97,
            ],
            [
                'code' => '61',
                'file_id' => 'BAACAgIAAxkBAAPjaYbXze7L1MKyT5y5imHeZupH8lQAAk0JAAIik1FLCtM2lYu4eAM6BA',
                'message_id' => 98,
            ],
            [
                'code' => '62',
                'file_id' => 'BAACAgIAAxkBAAPkaYbXzcYyCLccsuBgJc3iqvrWBD0AAiAIAAJGclBL6cUiYNeco0I6BA',
                'message_id' => 99,
            ],
            [
                'code' => '63',
                'file_id' => 'BAACAgIAAxkBAAPlaYbXzag_PGhr_H5lIqscythNOoUAAj0MAAL2V1BLLoY1M364xpE6BA',
                'message_id' => 100,
            ],
            [
                'code' => '64',
                'file_id' => 'BAACAgIAAxkBAAPmaYbXzZXz_DmiTNKH0mUrXtK__FsAAm0JAAJGclBLw3Z7taLrkZw6BA',
                'message_id' => 101,
            ],
            [
                'code' => '65',
                'file_id' => 'BAACAgIAAxkBAAPnaYbXzfrh8l-D9zVkwOkHURW-ZHAAAuM4AAJa7dhI48XAo0WV7Lo6BA',
                'message_id' => 102,
            ],
            [
                'code' => '66',
                'file_id' => 'BAACAgIAAxkBAAPoaYbXza-kGESPyYHiVUeishs3HjwAAoMKAAJ7fFFLAVRr9RR7GTI6BA',
                'message_id' => 103,
            ],
            [
                'code' => '67',
                'file_id' => 'BAACAgIAAxkBAAPpaYbXzZ5Mye8VcyV6H57yp-_IonsAAokQAAIhIUlL9NUsiVYNp-M6BA',
                'message_id' => 104,
            ],
            [
                'code' => '68',
                'file_id' => 'BAACAgIAAxkBAAPqaYbXzQABO8J6BHsjZjbKvRqMqB4AAxoKAAJGclBLmEeflLZPqjw6BA',
                'message_id' => 105,
            ],
            [
                'code' => '69',
                'file_id' => 'BAACAgIAAxkBAAPraYbXzVFy2q1l9UupF7EgtqJl6_IAAgMLAAJ7fFFLIJfBgsNFF446BA',
                'message_id' => 106,
            ],
            [
                'code' => '70',
                'file_id' => 'BAACAgIAAxkBAAPsaYbXzaOHTkaDYB6dQcm_VcR_LFgAAr8KAAI_CVFLeiYJyfqg8yc6BA',
                'message_id' => 107,
            ],
            [
                'code' => '71',
                'file_id' => 'BAACAgIAAxkBAAPtaYbXzTUoT_5DOf_uS4XoyUVE2awAApALAAIik1FLoVBqKG76fb46BA',
                'message_id' => 108,
            ],
            [
                'code' => '72',
                'file_id' => 'BAACAgIAAxkBAAPuaYbXzRymYhZi4UV_JdtdGQ69nR8AAkoLAAIO81FLN1nyFripPts6BA',
                'message_id' => 109,
            ],
            [
                'code' => '73',
                'file_id' => 'BAACAgIAAxkBAAPvaYbXzaoRUNrpKin-rPv8xjDLW98AAj4LAAI_CVFLZBLeIhBOPaI6BA',
                'message_id' => 110,
            ],
            [
                'code' => '74',
                'file_id' => 'BAACAgIAAxkBAAPwaYbXzZORQpSgpkwh7bARigsC_NMAAvMLAAJ7fFFLeojdQytSrrM6BA',
                'message_id' => 111,
            ],
            [
                'code' => '75',
                'file_id' => 'BAACAgIAAxkBAAPxaYbXzRfMZpUU6bWNfmotr5x7BVYAAiwPAAL2V1BLsNMVwsdn7qE6BA',
                'message_id' => 112,
            ],
            [
                'code' => '76',
                'file_id' => 'BAACAgIAAxkBAAPyaYbXzbjvMk0pOHg9sUCIBj3X-HIAAqMKAAIhIVFLNWJanaZBYnU6BA',
                'message_id' => 113,
            ],
            [
                'code' => '77',
                'file_id' => 'BAACAgIAAxkBAAPzaYbXzVGtlfNd58enc56n67MxzuYAAqAKAAJtNFhL6LDKD5a24hY6BA',
                'message_id' => 114,
            ],
            [
                'code' => '78',
                'file_id' => 'BAACAgIAAxkBAAP0aYbXzYPdr1gXHxHf-x-xkpf7VEAAApoJAAJBtFhLGzc2uNE8zMo6BA',
                'message_id' => 115,
            ],
            [
                'code' => '79',
                'file_id' => 'BAACAgIAAxkBAAP1aYbXzXjWELVinhRbq-iXmgi5hp4AAsMLAALdVVlLGNHYv-KKQRo6BA',
                'message_id' => 116,
            ],
            [
                'code' => '80',
                'file_id' => 'BAACAgIAAxkBAAP2aYbXzV1JWBOUhZqsn7AIFuydYTUAAm8KAAIzWFhLKXIyQnbHbvQ6BA',
                'message_id' => 117,
            ],
            [
                'code' => '81',
                'file_id' => 'BAACAgIAAxkBAAP3aYbXzbaQvrbie8iLcVmUF9kCCfoAAlcLAAIzWFhLnCF6Es5GvhA6BA',
                'message_id' => 118,
            ],
            [
                'code' => '82',
                'file_id' => 'BAACAgIAAxkBAAP4aYbXzdoraE6Uu9nLq7y9OSdPMv8AAkoKAAIh21hLxFpvqc8G2Lw6BA',
                'message_id' => 119,
            ],
            [
                'code' => '83',
                'file_id' => 'BAACAgIAAxkBAAP5aYbXzU-0NLa73Gk2BlsbHCQM7R4AAjEMAAKJB1lLUfrZUfgvovw6BA',
                'message_id' => 120,
            ],
            [
                'code' => '84',
                'file_id' => 'BAACAgIAAxkBAAP6aYbXzUkefq571BJKx5gyj5FjXS4AAmYIAAJtNGBLZsJDuNE0yko6BA',
                'message_id' => 121,
            ],
            [
                'code' => '85',
                'file_id' => 'BAACAgIAAxkBAAP7aYbXzUgEuogU6MWoLLkKlHifQ_EAAh8MAAIzWFhL4jvy5nxKGZY6BA',
                'message_id' => 122,
            ],
            [
                'code' => '86',
                'file_id' => 'BAACAgIAAxkBAAP8aYbXzZB9LXMGmbY4LhbSbwSF2mUAAjILAAJLuVlLcJ_lhLLvcC06BA',
                'message_id' => 123,
            ],
            [
                'code' => '87',
                'file_id' => 'BAACAgIAAxkBAAP9aYbXzXva3_DzCrbeaPnkJR4f0YIAAmgMAAIzWFhLMeVJM7ke8eM6BA',
                'message_id' => 124,
            ],
            [
                'code' => '88',
                'file_id' => 'BAACAgIAAxkBAAP-aYbXzf3ijvsSf8B3kLHFwV-RXUQAAnQMAAIh22BLePOCyy3Rgx06BA',
                'message_id' => 125,
            ],
            [
                'code' => '89',
                'file_id' => 'BAACAgIAAxkBAAP-aYbXzcOj09uqwT2C9sVz-JEtWC4AAikPAAJLuWFLEW5Jui5S-146BA',
                'message_id' => 126,
            ],
            [
                'code' => '90',
                'file_id' => 'BAACAgIAAxkBAAP_aYbXzSbqXuZSNhPv1g7qMuXe51oAAnAOAAJQeMBILKTR0bSq_Pg6BA',
                'message_id' => 127,
            ],
            [
                'code' => '91',
                'file_id' => 'BAACAgIAAxkBAAIBAWmG182pDZf_8ZnVfM10w6RSZUWGAALeDgACM1hgS1ctYVakN3WQOgQ',
                'message_id' => 128,
            ],
            [
                'code' => '92',
                'file_id' => 'BAACAgIAAxkBAAIBAmmG180MAAH0YLUKEsGHMVm4IjXSyAAC_QwAAt1VYUtnJAejPZzmRjoE',
                'message_id' => 129,
            ],
            [
                'code' => '93',
                'file_id' => 'BAACAgIAAxkBAAIBA2mG181X45W2nlml-zvcPFWgNHASAAJmDwACM1hgS0Ywhd4Fb1owOgQ',
                'message_id' => 130,
            ],
            [
                'code' => '94',
                'file_id' => 'BAACAgIAAxkBAAIBBGmG182QUNjyuSDdTnwAAcvBmj2wQwACwAoAAm00aEvW4fyyK2lGjjoE',
                'message_id' => 131,
            ],
            [
                'code' => '95',
                'file_id' => 'BAACAgIAAxkBAAIBBWmG183YX5me9w_bjh8NyNRr2MckAAJ9CQACQbRoS-PWhILTfrxtOgQ',
                'message_id' => 132,
            ],
            [
                'code' => '96',
                'file_id' => 'BAACAgIAAxkBAAIBBmmG183C809HokEcDeYlu610fINjAAJ8DgAC3VVhS_JOiiFEyBb4OgQ',
                'message_id' => 133,
            ],
            [
                'code' => '97',
                'file_id' => 'BAACAgIAAxkBAAIBB2mG1807qWKZH1O40lA-9X8WicrFAAKfBgACbdxpS0n07okmb3d6OgQ',
                'message_id' => 134,
            ],
            [
                'code' => '98',
                'file_id' => 'BAACAgIAAxkBAAIBCGmG1801ciBKUc1ju4H_-MhU-yz4AAI5CgACuGpoS1J2Hn43t1M3OgQ',
                'message_id' => 135,
            ],
            [
                'code' => '99',
                'file_id' => 'BAACAgIAAxkBAAIBCWmG180akAFrIYA4zkcWkDaoalq_AAJUCAACwUVpS64ZMIPsy4G_OgQ',
                'message_id' => 136,
            ],
            [
                'code' => '100',
                'file_id' => 'BAACAgIAAxkBAAIBCmmG182SocqZHBI3t3MlhqMBfX6vAAI0CgACwUVpSwQwwHJp8TMjOgQ',
                'message_id' => 137,
            ],
            [
                'code' => '101',
                'file_id' => 'BAACAgIAAxkBAAIBC2mG182uVC6fffoYKi2OFIY6H4ypAAKWDwACLiZpS7l2YHJryw4rOgQ',
                'message_id' => 138,
            ],
            [
                'code' => '102',
                'file_id' => 'BAACAgIAAxkBAAIBDGmG182eo5uYA5ZQ4J_tsrHIUN2-AAIDBwACLiZxS0U84PaXBUHnOgQ',
                'message_id' => 139,
            ],
            [
                'code' => '103',
                'file_id' => 'BAACAgIAAxkBAAIBDWmG181I5bR9WRGWqgU9vq0_omWtAAKADQACwUVpS37Z73AGerZeOgQ',
                'message_id' => 140,
            ],
            [
                'code' => '104',
                'file_id' => 'BAACAgIAAxkBAAIBDmmG1814GbYmu1Q1MS-hWmiP0WvfAAKBBwACLiZxS_BxR4dGe0YpOgQ',
                'message_id' => 141,
            ],
            [
                'code' => '105',
                'file_id' => 'BAACAgIAAxkBAAIBD2mG182QnqiJkW_1BFZcK-_xUpmeAALnCAACvHZwSwxOE4FHMg-fOgQ',
                'message_id' => 142,
            ],
            [
                'code' => '106',
                'file_id' => 'BAACAgIAAyEFAATW7Y_gAAOPaYbWCbn2RtBY8IQdp-NQBk-gd4MAAvwKAAKA9nFL41tWTSkIASQ6BA',
                'message_id' => 143,
            ],
            [
                'code' => '107',
                'file_id' => 'BAACAgIAAyEFAATW7Y_gAAOQaYbWG_9wye3NsxKlJMNZKaEJlzgAAhILAAKA9nFLn8_NDEeqEEE6BA',
                'message_id' => 144,
            ],
            [
                'code' => '108',
                'file_id' => 'BAACAgIAAyEFAATW7Y_gAAORaYbWJVZVS6tvRzJ6V8l8IlbJvgUAAoIJAAIR1nBL_3phrE1zdgY6BA',
                'message_id' => 145,
            ],
            [
                'code' => '109',
                'file_id' => 'BAACAgIAAyEFAATW7Y_gAAOSaYbWLniK6q2Kba6y3QKV4bYFWogAAqIMAAK4anBLb4eLAddX40Y6BA',
                'message_id' => 146,
            ],
            [
                'code' => '110',
                'file_id' => 'BAACAgIAAyEFAATW7Y_gAAOTaYbWOhdtIwFOe8XXvbwXcm8iiuwAAswQAAJQeLhI0YOyrbUWInE6BA',
                'message_id' => 147,
            ],
            [
                'code' => '111',
                'file_id' => 'BAACAgIAAyEFAATW7Y_gAAOUaYbWRQ2dd2YK4HLAVrD9Pzjbux4AAs0QAAJQeLhIi0ibo5PW3_o6BA',
                'message_id' => 148,
            ],
            [
                'code' => '112',
                'file_id' => 'BAACAgIAAyEFAATW7Y_gAAOVaYbWU3CXPLc3q3PSzqdZWphtnzwAAs4QAAJQeLhIbt0n9peEwFI6BA',
                'message_id' => 149,
            ],
            [
                'code' => '113',
                'file_id' => 'BAACAgIAAyEFAATW7Y_gAAOWaYbWXuE-ujL5HErsnmSq2UQcU2MAAnQOAAJQeMBI_v1JyNnUuVU6BA',
                'message_id' => 150,
            ],
            [
                'code' => '114',
                'file_id' => 'BAACAgIAAyEFAATW7Y_gAAOYaYbWajPQlJnrKYmzlHCAPq0jDfoAArUPAAK4anBLW-XvyASiS5c6BA',
                'message_id' => 151,
            ],
            [
                'code' => '115',
                'file_id' => 'BAACAgIAAyEFAATW7Y_gAAOZaYbWd8E8KWEE6KXhDnmw7d8vGBQAAv8PAAK4anBLqCTjGVsBiUE6BA',
                'message_id' => 152,
            ],
            [
                'code' => '116',
                'file_id' => 'BAACAgIAAyEFAATW7Y_gAAOaaYbWgZefnLvb56HvJse0LhWRh9gAAjQOAAIuJnFLqC6sDshZwR46BA',
                'message_id' => 153,
            ],
            [
                'code' => '117',
                'file_id' => 'BAACAgIAAyEFAATW7Y_gAAObaYbWjx7Rlw-7Dai9FEcNAAE5hcDWAALjDgACbdxxS_Lp4FEvAz2yOgQ',
                'message_id' => 154,
            ],
            [
                'code' => '118',
                'file_id' => 'BAACAgIAAyEFAATW7Y_gAAOcaYbWnHtSDZVa-8uFLa6NyuKX1xIAAsIHAALPAXlL7CzhhTfPDoE6BA',
                'message_id' => 155,
            ],
            [
                'code' => '119',
                'file_id' => 'BAACAgIAAyEFAATW7Y_gAAOdaYbWqAv4s0Th0YAL6ndzPv3GQjkAAjUIAAIaRBhKy4qOiPe_VpQ6BA',
                'message_id' => 156,
            ],
            [
                'code' => '120',
                'file_id' => 'BAACAgIAAyEFAATW7Y_gAAOeaYbWveL8ODUEc-5GYhfTU6y-ruoAAvwJAAJO-XhLDkZ5KznBpwQ6BA',
                'message_id' => 157,
            ],
            [
                'code' => '121',
                'file_id' => 'BAACAgIAAyEFAATW7Y_gAAOfaYbWyQcuUuMCdg6Cm1gDB4MMJM8AAj4KAAJF83hLhxjfAknK6AU6BA',
                'message_id' => 158,
            ],
            [
                'code' => '122',
                'file_id' => 'BAACAgIAAyEFAATW7Y_gAAOgaYbW1-37xaE3zy8auxBFnbgc0OkAAoEKAAJO-XhL6nOXCxv7xwo6BA',
                'message_id' => 159,
            ],
            [
                'code' => '123',
                'file_id' => 'BAACAgIAAyEFAATW7Y_gAAOhaYbW4g-c04tkQEULuIeLvCKmv9YAAp4KAAJF83hLHu-_v2Kultw6BA',
                'message_id' => 160,
            ],
            [
                'code' => '124',
                'file_id' => 'BAACAgIAAyEFAATW7Y_gAAOiaYbW8a3cfG9EqP_KXDvQwyxIZFkAAo0MAAIKanhL5RHK8Fl3nB06BA',
                'message_id' => 161,
            ],
            [
                'code' => '125',
                'file_id' => 'BAACAgIAAyEFAATW7Y_gAAOjaYbW-3GqPkCsWavuRJJMcIDslDgAAswHAAIiioFL19wcmRHaYbY6BA',
                'message_id' => 162,
            ],
            [
                'code' => '126', // Eslatma: Bu yerda 125 kodi takrorlangan, amma message_id farq qiladi
                'file_id' => 'BAACAgIAAyEFAATW7Y_gAAOkaYbXCPJjZ-qTf3_zuJZlTCDCj6oAAvEHAAIiioFLW3gSOKnmEUw6BA',
                'message_id' => 163,
            ],
            [
                'code' => '127',
                'file_id' => 'BAACAgIAAyEFAATW7Y_gAAOlaYbXEXsEaCRvRXSd2nNYm16R6FcAAhAJAAJO-YBLVNFGIt5DQZ46BA',
                'message_id' => 164,
            ],
            [
                'code' => '128',
                'file_id' => 'BAACAgIAAyEFAATW7Y_gAAOmaYbXHSJy5320OCyjbRYFC-zHFlMAAnQLAAIhMoFLUNL2CyaRahs6BA',
                'message_id' => 165,
            ],
            [
                'code' => '130',
                'file_id' => 'BAACAgIAAyEFAATW7Y_gAAOnaYbXJceLhcnA6yymLB5yky32ngQAAj4JAAL0cplLIJPZb_UK4JE6BA',
                'message_id' => 166,
            ],
            [
                'code' => '131',
                'file_id' => 'BAACAgIAAyEFAATW7Y_gAAOoaYbXL2Ms4_TmcjG0Q5Kpj8jomE8AAn8JAAJJBLBL6uKlgRQ6aJw6BA',
                'message_id' => 167,
            ],
            [
                'code' => '132',
                'file_id' => 'BAACAgIAAyEFAATW7Y_gAAOpaYbXOXrjeLXpPogI28-Q2da_UaIAAtYLAAJMh7FLR2kPWRmE9zI6BA',
                'message_id' => 168,
            ],
            [
                'code' => '133',
                'file_id' => 'BAACAgIAAyEFAATW7Y_gAAOqaYbXQzh3pW_3DdVgtpzvWZCDsOgAAooFAAJIIhlLGPfrEp2GVQw6BA',
                'message_id' => 169,
            ],
            [
                'code' => '134',
                'file_id' => 'BAACAgIAAyEFAATW7Y_gAAOraYbXU5sR22J9HLlS2JjJ6G34DIkAAq4NAALECdBLAe4aswMAAToxOgQ',
                'message_id' => 170,
            ],
        ];

        // Har bir video uchun ma'lumotlar
        foreach ($logData as $movie) {
            $movies[] = [
                'code' => $movie['code'],
                'channel_id' => env('TELEGRAM_CHANNEL_USERNAME', '@kinomed1aa'),
                'message_id' => $movie['message_id'],
                'file_id' => $movie['file_id'],
                'views' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }

        // Database ga qo'shish
        DB::table('movies')->insert($movies);

        $this->command->info(count($movies) . ' ta kino seed qilindi!');
        
        // Kodlarni guruhlab ko'rsatish
        $codes = array_column($movies, 'code');
        $uniqueCodes = array_unique($codes);
        $duplicateCodes = array_diff_assoc($codes, array_unique($codes));
        
        $this->command->info('Kino kodlari: ' . implode(', ', $uniqueCodes));
        $this->command->info('Kodlar ' . min($codes) . ' dan ' . max($codes) . ' gacha');
        
        if (!empty($duplicateCodes)) {
            $this->command->warn('Eslatma: Quyidagi kodlar takrorlangan: ' . implode(', ', array_unique($duplicateCodes)));
        }
    }
}