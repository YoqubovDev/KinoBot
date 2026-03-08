<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Serial;
use App\Models\SerialEpisode;
use App\Models\Movie;

class SerialSeeder extends Seeder
{
    public function run()
    {
        $this->seedGassolS1();
        $this->seedGassol();
        $this->seedJumong();
        $this->seedUmarIbnHattob();
        $this->seedDengizHukumdori();
        $this->seedTaxtlarOyini();
    }

    private function seedGassolS1()
    {
        $serialName = "G'assol 1-fasl";
        $channelId = "-1003605893088";
        $serial = Serial::firstOrCreate(['name' => $serialName]);

        $episodes = [
            ['ep' => 1,  'code' => '28', 'msg_id' => 64, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAANAaYxd7I5AAuQ5iGkuHsV6ptZcENsAAix0AALWv3FIoi3wmmKlvGg6BA'],
            ['ep' => 2,  'code' => '29', 'msg_id' => 65, 'file_id' => 'BAACAgIAAxkBAAIDfGmPYKQLgUds37eqhKyleDlC5BrYAAItdAAC1r9xSHZ_leh5sICzOgQ'],
            ['ep' => 3,  'code' => '30', 'msg_id' => 66, 'file_id' => 'BAACAgIAAxkBAAIDfWmPYKRNgMJscXmrBG1Uqxc0aHW7AAKcdAAC1r9xSC2qgLRuJGCZOgQ'],
            ['ep' => 4,  'code' => '31', 'msg_id' => 67, 'file_id' => 'BAACAgIAAxkBAAIDfmmPYKQv650BkT_NXq9kAAHQou3phQACnXQAAta_cUiIGQABCyvXaFU6BA'],
            ['ep' => 5,  'code' => '32', 'msg_id' => 68, 'file_id' => 'BAACAgIAAxkBAAIDf2mPYKR5id4TAwr9aE10_die9ge4AAKbdAAC1r9xSOwfaz6MJE3oOgQ'],
            ['ep' => 6,  'code' => '33', 'msg_id' => 69, 'file_id' => 'BAACAgIAAxkBAAIDgGmPYKQ9WtiBJzEszYtiHiGZLWMqAAKedAAC1r9xSK75IkE2Ox2UOgQ'],
            ['ep' => 7,  'code' => '34', 'msg_id' => 70, 'file_id' => 'BAACAgIAAxkBAAIDgWmPYKSr7LcyIVJOGoIlnVuXqc9VAAKgdAAC1r9xSJkb1yckrK2-OgQ'],
            ['ep' => 8,  'code' => '35', 'msg_id' => 71, 'file_id' => 'BAACAgIAAxkBAAIDgmmPYKS6Lxn6NacvQvdLnqN9Ux4sAAKfdAAC1r9xSDLJqvpjc1yTOgQ'],
            ['ep' => 9,  'code' => '36', 'msg_id' => 72, 'file_id' => 'BAACAgIAAxkBAAIDg2mPYKTsuedXJFc-r5otTW7cIz7QAAKhdAAC1r9xSEO8Mlo7eKwmOgQ'],
            ['ep' => 10, 'code' => '37', 'msg_id' => 73, 'file_id' => 'BAACAgIAAxkBAAIDhGmPYKQKgps5wQaI9GABkcoMl3f2AAKidAAC1r9xSOEt_fqJ2gqUOgQ'],
        ];

        foreach ($episodes as $data) {
            SerialEpisode::updateOrCreate(
                ['serial_id' => $serial->id, 'episode_number' => $data['ep']],
                ['file_id' => $data['file_id']]
            );
             Movie::updateOrCreate(
                ['code' => $data['code']],
                [
                    'name' => "{$serialName} {$data['ep']}-qism",
                    'channel_id' => $channelId,
                    'message_id' => $data['msg_id'],
                    'file_id' => $data['file_id'],
                ]
            );
        }
    }

    private function seedGassol()
    {
        $serialName = "G'assol 2-fasl";
        $channelId = "-1003605893088";
        $serial = Serial::firstOrCreate(['name' => $serialName]);

        $episodes = [
            ['ep' => 1, 'code' => '146', 'msg_id' => 309, 'file_id' => 'BAACAgIAAxkBAAIBEmmG182QUTjyuSDdTnwAAcvBmj2wQwACwAoAAm00aEvW4fyyK2lGjjoE'],
            ['ep' => 2, 'code' => '147', 'msg_id' => 311, 'file_id' => 'BAACAgIAAxkBAAIBE2mG183YX5me9w_bjh8NyNRr2MckAAJ9CQACQbRoS-PWhILTfrxtOgQ'],
            ['ep' => 3, 'code' => '148', 'msg_id' => 312, 'file_id' => 'BAACAgIAAxkBAAIBFGmG183C809HokEcDeYlu610fINjAAJ8DgAC3VVhS_JOiiFEyBb4OgQ'],
            ['ep' => 4, 'code' => '149', 'msg_id' => 313, 'file_id' => 'BAACAgIAAxkBAAIBFWmG1807qWKZH1O40lA-9X8WicrFAAKfBgACbdxpS0n07okmb3d6OgQ'],
            ['ep' => 5, 'code' => '150', 'msg_id' => 314, 'file_id' => 'BAACAgIAAxkBAAIBFmmG1801ciBKUc1ju4H_-MhU-yz4AAI5CgACuGpoS1J2Hn43t1M3OgQ'],
            ['ep' => 6, 'code' => '151', 'msg_id' => 315, 'file_id' => 'BAACAgIAAxkBAAIBF2mG180akAFrIYA4zkcWkDaoalq_AAJUCAACwUVpS64ZMIPsy4G_OgQ'],
            ['ep' => 7, 'code' => '152', 'msg_id' => 316, 'file_id' => 'BAACAgIAAxkBAAIBGGmG182SocqZHBI3t3MlhqMBfX6vAAI0CgACwUVpSwQwwHJp8TMjOgQ'],
            ['ep' => 8, 'code' => '153', 'msg_id' => 317, 'file_id' => 'BAACAgIAAxkBAAIBGWmG182uVC6fffoYKi2OFIY6H4ypAAKWDwACLiZpS7l2YHJryw4rOgQ'],
            ['ep' => 9, 'code' => '154', 'msg_id' => 318, 'file_id' => 'BAACAgIAAxkBAAIBGmmG182eo5uYA5ZQ4J_tsrHIUN2-AAIDBwACLiZxS0U84PaXBUHnOgQ'],
            ['ep' => 10, 'code' => '155', 'msg_id' => 319, 'file_id' => 'BAACAgIAAxkBAAIBG2mG181I5bR9WRGWqgU9vq0_omWtAAKADQACwUVpS37Z73AGerZeOgQ'],
        ];

        foreach ($episodes as $data) {
            SerialEpisode::updateOrCreate(
                ['serial_id' => $serial->id, 'episode_number' => $data['ep']],
                ['file_id' => $data['file_id']]
            );
            Movie::updateOrCreate(
                ['code' => $data['code']],
                [
                    'name' => "{$serialName} {$data['ep']}-qism",
                    'channel_id' => $channelId,
                    'message_id' => $data['msg_id'],
                    'file_id' => $data['file_id'],
                ]
            );
        }
    }

    private function seedJumong()
    {
        $serialName = "Jumong afsonasi";
        $channelId = "-1003605893088";
        $serial = Serial::firstOrCreate(['name' => $serialName]);

        $episodes = [
            ['ep' => 1, 'code' => '200', 'msg_id' => 93, 'file_id' => 'BAACAgIAAxkBAAPeaYbXzYr_4nypHlTD-JmvmAo8ynQAApwRAAKYhVBI7UL00cm2NLA6BA'],
            ['ep' => 2, 'code' => '201', 'msg_id' => 94, 'file_id' => 'BAACAgIAAxkBAAPfaYbXzXBpoRClTT-9oMGwQX6JRdMAAqARAAKYhVBIxV2MOEm4WIQ6BA'],
            ['ep' => 3, 'code' => '202', 'msg_id' => 95, 'file_id' => 'BAACAgIAAxkBAAPgaYbXzepGVwABeJjnig2EfvFfjxOCAAKhEQACmIVQSEJMb3VUJjEJOgQ'],
            ['ep' => 4, 'code' => '203', 'msg_id' => 96, 'file_id' => 'BAACAgIAAxkBAAPhaYbXzaoyPKcw1mbo3Winf4nv8xYAAqMRAAKYhVBI3fegz7vsxPM6BA'],
            ['ep' => 5, 'code' => '204', 'msg_id' => 97, 'file_id' => 'BAACAgIAAxkBAAPiaYbXzTaLWcTZxBKBTajOuCFRBIcAAjYKAAIik0lLmI69Ty0fuWc6BA'],
            ['ep' => 6, 'code' => '205', 'msg_id' => 98, 'file_id' => 'BAACAgIAAxkBAAPjaYbXze7L1MKyT5y5imHeZupH8lQAAk0JAAIik1FLCtM2lYu4eAM6BA'],
            ['ep' => 7, 'code' => '206', 'msg_id' => 99, 'file_id' => 'BAACAgIAAxkBAAPkaYbXzcYyCLccsuBgJc3iqvrWBD0AAiAIAAJGclBL6cUiYNeco0I6BA'],
            ['ep' => 8, 'code' => '207', 'msg_id' => 100, 'file_id' => 'BAACAgIAAxkBAAPlaYbXzag_PGhr_H5lIqscythNOoUAAj0MAAL2V1BLLoY1M364xpE6BA'],
            ['ep' => 9, 'code' => '208', 'msg_id' => 101, 'file_id' => 'BAACAgIAAxkBAAPmaYbXzZXz_DmiTNKH0mUrXtK__FsAAm0JAAJGclBLw3Z7taLrkZw6BA'],
            ['ep' => 10, 'code' => '209', 'msg_id' => 102, 'file_id' => 'BAACAgIAAxkBAAPnaYbXzfrh8l-D9zVkwOkHURW-ZHAAAuM4AAJa7dhI48XAo0WV7Lo6BA'],
            ['ep' => 11, 'code' => '210', 'msg_id' => 103, 'file_id' => 'BAACAgIAAxkBAAPoaYbXza-kGESPyYHiVUeishs3HjwAAoMKAAJ7fFFLAVRr9RR7GTI6BA'],
            ['ep' => 12, 'code' => '211', 'msg_id' => 104, 'file_id' => 'BAACAgIAAxkBAAPpaYbXzZ5Mye8VcyV6H57yp-_IonsAAokQAAIhIUlL9NUsiVYNp-M6BA'],
            ['ep' => 13, 'code' => '212', 'msg_id' => 105, 'file_id' => 'BAACAgIAAxkBAAPqaYbXzQABO8J6BHsjZjbKvRqMqB4AAxoKAAJGclBLmEeflLZPqjw6BA'],
            ['ep' => 14, 'code' => '213', 'msg_id' => 106, 'file_id' => 'BAACAgIAAxkBAAPraYbXzVFy2q1l9UupF7EgtqJl6_IAAgMLAAJ7fFFLIJfBgsNFF446BA'],
            ['ep' => 15, 'code' => '214', 'msg_id' => 107, 'file_id' => 'BAACAgIAAxkBAAPsaYbXzaOHTkaDYB6dQcm_VcR_LFgAAr8KAAI_CVFLeiYJyfqg8yc6BA'],
            ['ep' => 16, 'code' => '215', 'msg_id' => 325, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBRWmfIWnW-1OSGftP5U5m6Ig-Li3NAAKNCQACISFRS4YJxDM4bQj6OgQ'],
            ['ep' => 17, 'code' => '216', 'msg_id' => 108, 'file_id' => 'BAACAgIAAxkBAAPtaYbXzTUoT_5DOf_uS4XoyUVE2awAApALAAIik1FLoVBqKG76fb46BA'],
            ['ep' => 18, 'code' => '217', 'msg_id' => 109, 'file_id' => 'BAACAgIAAxkBAAPuaYbXzRymYhZi4UV_JdtdGQ69nR8AAkoLAAIO81FLN1nyFripPts6BA'],
            ['ep' => 19, 'code' => '218', 'msg_id' => 110, 'file_id' => 'BAACAgIAAxkBAAPvaYbXzaoRUNrpKin-rPv8xjDLW98AAj4LAAI_CVFLZBLeIhBOPaI6BA'],
            ['ep' => 20, 'code' => '219', 'msg_id' => 111, 'file_id' => 'BAACAgIAAxkBAAPwaYbXzZORQpSgpkwh7bARigsC_NMAAvMLAAJ7fFFLeojdQytSrrM6BA'],
            ['ep' => 21, 'code' => '220', 'msg_id' => 112, 'file_id' => 'BAACAgIAAxkBAAPxaYbXzRfMZpUU6bWNfmotr5x7BVYAAiwPAAL2V1BLsNMVwsdn7qE6BA'],
            ['ep' => 22, 'code' => '221', 'msg_id' => 113, 'file_id' => 'BAACAgIAAxkBAAPyaYbXzbjvMk0pOHg9sUCIBj3X-HIAAqMKAAIhIVFLNWJanaZBYnU6BA'],
            ['ep' => 23, 'code' => '222', 'msg_id' => 114, 'file_id' => 'BAACAgIAAxkBAAPzaYbXzVGtlfNd58enc56n67MxzuYAAqAKAAJtNFhL6LDKD5a24hY6BA'],
            ['ep' => 24, 'code' => '223', 'msg_id' => 115, 'file_id' => 'BAACAgIAAxkBAAP0aYbXzYPdr1gXHxHf-x-xkpf7VEAAApoJAAJBtFhLGzc2uNE8zMo6BA'],
            ['ep' => 25, 'code' => '224', 'msg_id' => 116, 'file_id' => 'BAACAgIAAxkBAAP1aYbXzXjWELVinhRbq-iXmgi5hp4AAsMLAALdVVlLGNHYv-KKQRo6BA'],
            ['ep' => 26, 'code' => '225', 'msg_id' => 117, 'file_id' => 'BAACAgIAAxkBAAP2aYbXzV1JWBOUhZqsn7AIFuydYTUAAm8KAAIzWFhLKXIyQnbHbvQ6BA'],
            ['ep' => 27, 'code' => '226', 'msg_id' => 118, 'file_id' => 'BAACAgIAAxkBAAP3aYbXzbaQvrbie8iLcVmUF9kCCfoAAlcLAAIzWFhLnCF6Es5GvhA6BA'],
            ['ep' => 28, 'code' => '227', 'msg_id' => 119, 'file_id' => 'BAACAgIAAxkBAAP4aYbXzdoraE6Uu9nLq7y9OSdPMv8AAkoKAAIh21hLxFpvqc8G2Lw6BA'],
            ['ep' => 29, 'code' => '228', 'msg_id' => 120, 'file_id' => 'BAACAgIAAxkBAAP5aYbXzU-0NLa73Gk2BlsbHCQM7R4AAjEMAAKJB1lLUfrZUfgvovw6BA'],
            ['ep' => 30, 'code' => '229', 'msg_id' => 121, 'file_id' => 'BAACAgIAAxkBAAP6aYbXzUkefq571BJKx5gyj5FjXS4AAmYIAAJtNGBLZsJDuNE0yko6BA'],
            ['ep' => 31, 'code' => '230', 'msg_id' => 122, 'file_id' => 'BAACAgIAAxkBAAP7aYbXzUgEuogU6MWoLLkKlHifQ_EAAh8MAAIzWFhL4jvy5nxKGZY6BA'],
            ['ep' => 32, 'code' => '231', 'msg_id' => 123, 'file_id' => 'BAACAgIAAxkBAAP8aYbXzZB9LXMGmbY4LhbSbwSF2mUAAjILAAJLuVlLcJ_lhLLvcC06BA'],
            ['ep' => 33, 'code' => '232', 'msg_id' => 124, 'file_id' => 'BAACAgIAAxkBAAP9aYbXzXva3_DzCrbeaPnkJR4f0YIAAmgMAAIzWFhLMeVJM7ke8eM6BA'],
            ['ep' => 34, 'code' => '233', 'msg_id' => 125, 'file_id' => 'BAACAgIAAxkBAAP-aYbXzf3ijvsSf8B3kLHFwV-RXUQAAnQMAAIh22BLePOCyy3Rgx06BA'],
            ['ep' => 35, 'code' => '234', 'msg_id' => 126, 'file_id' => 'BAACAgIAAxkBAAP_aYbXzcOj09uqwT2C9sVz-JEtWC4AAikPAAJLuWFLEW5Jui5S-146BA'],
            ['ep' => 36, 'code' => '235', 'msg_id' => 127, 'file_id' => 'BAACAgIAAxkBAAIBAAFphtfNTnNLf6kHZoIQEYbZJYYS8gACegoAAv7UYEvWr1Q_WFp4_zoE'],
            ['ep' => 37, 'code' => '236', 'msg_id' => 128, 'file_id' => 'BAACAgIAAxkBAAIBAWmG182pDZf_8ZnVfM10w6RSZUWGAALeDgACM1hgS1ctYVakN3WQOgQ'],
            ['ep' => 38, 'code' => '237', 'msg_id' => 129, 'file_id' => 'BAACAgIAAxkBAAIBAmmG180MAAH0YLUKEsGHMVm4IjXSyAAC_QwAAt1VYUtnJAejPZzmRjoE'],
            ['ep' => 39, 'code' => '238', 'msg_id' => 130, 'file_id' => 'BAACAgIAAxkBAAIBA2mG181X45W2nlml-zvcPFWgNHASAAJmDwACM1hgS0Ywhd4Fb1owOgQ'],
            ['ep' => 40, 'code' => '239', 'msg_id' => 131, 'file_id' => 'BAACAgIAAxkBAAIBBGmG182QUNjyuSDdTnwAAcvBmj2wQwACwAoAAm00aEvW4fyyK2lGjjoE'],
            ['ep' => 41, 'code' => '240', 'msg_id' => 132, 'file_id' => 'BAACAgIAAxkBAAIBBWmG183YX5me9w_bjh8NyNRr2MckAAJ9CQACQbRoS-PWhILTfrxtOgQ'],
            ['ep' => 42, 'code' => '241', 'msg_id' => 133, 'file_id' => 'BAACAgIAAxkBAAIBBmmG183C809HokEcDeYlu610fINjAAJ8DgAC3VVhS_JOiiFEyBb4OgQ'],
            ['ep' => 43, 'code' => '242', 'msg_id' => 134, 'file_id' => 'BAACAgIAAxkBAAIBB2mG1807qWKZH1O40lA-9X8WicrFAAKfBgACbdxpS0n07okmb3d6OgQ'],
            ['ep' => 44, 'code' => '243', 'msg_id' => 135, 'file_id' => 'BAACAgIAAIBCGmG1801ciBKUc1ju4H_-MhU-yz4AAI5CgACuGpoS1J2Hn43t1M3OgQ'],
            ['ep' => 45, 'code' => '244', 'msg_id' => 136, 'file_id' => 'BAACAgIAAIBCWmG180akAFrIYA4zkcWkDaoalq_AAJUCAACwUVpS64ZMIPsy4G_OgQ'],
            ['ep' => 46, 'code' => '245', 'msg_id' => 137, 'file_id' => 'BAACAgIAAIBCmmG182SocqZHBI3t3MlhqMBfX6vAAI0CgACwUVpSwQwwHJp8TMjOgQ'],
            ['ep' => 47, 'code' => '246', 'msg_id' => 138, 'file_id' => 'BAACAgIAAIBC2mG182uVC6fffoYKi2OFIY6H4ypAAKWDwACLiZpS7l2YHJryw4rOgQ'],
            ['ep' => 48, 'code' => '247', 'msg_id' => 139, 'file_id' => 'BAACAgIAAIABDGmG182eo5uYA5ZQ4J_tsrHIUN2-AAIDBwACLiZxS0U84PaXBUHnOgQ'],
            ['ep' => 49, 'code' => '248', 'msg_id' => 140, 'file_id' => 'BAACAgIAAIABDWmG181I5bR9WRGWqgU9vq0_omWtAAKADQACwUVpS37Z73AGerZeOgQ'],
            ['ep' => 50, 'code' => '249', 'msg_id' => 141, 'file_id' => 'BAACAgIAAIABDmmG1814GbYmu1Q1MS-hWmiP0WvfAAKBBwACLiZxS_BxR4dGe0YpOgQ'],
            ['ep' => 51, 'code' => '250', 'msg_id' => 142, 'file_id' => 'BAACAgIAAIABD2mG182QnqiJkW_1BFZcK-_xUpmeAALnCAACvHZwSwxOE4FHMg-fOgQ'],
            ['ep' => 52, 'code' => '251', 'msg_id' => 143, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAOPaYbWCbn2RtBY8IQdp-NQBk-gd4MAAvwKAAKA9nFL41tWTSkIASQ6BA'],
            ['ep' => 53, 'code' => '252', 'msg_id' => 144, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAOQaYbWG_9wye3NsxKlJMNZKaEJlzgAAhILAAKA9nFLn8_NDEeqEEE6BA'],
            ['ep' => 54, 'code' => '253', 'msg_id' => 145, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAORaYbWJVZVS6tvRzJ6V8l8IlbJvgUAAoIJAAIR1nBL_3phrE1zdgY6BA'],
            ['ep' => 55, 'code' => '254', 'msg_id' => 146, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAOSaYbWLniK6q2Kba6y3QKV4bYFWogAAqIMAAK4anBLb4eLAddX40Y6BA'],
            ['ep' => 56, 'code' => '255', 'msg_id' => 147, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAOTaYbWOhdtIwFOe8XXvbwXcm8iiuwAAswQAAJQeLhI0YOyrbUWInE6BA'],
            ['ep' => 60, 'code' => '259', 'msg_id' => 151, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAOXaYbWXuE-ujL5HErsnmSq2UQcU2MAAnQOAAJQeMBI_v1JyNnUuVU6BA'],
            ['ep' => 61, 'code' => '260', 'msg_id' => 152, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAOYaYbWajPQlJnrKYmzlHCAPq0jDfoAArUPAAK4anBLW-XvyASiS5c6BA'],
            ['ep' => 62, 'code' => '261', 'msg_id' => 153, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAOZaYbWd8E8KWEE6KXhDnmw7d8vGBQAAv8PAAK4anBLqCTjGVsBiUE6BA'],
            ['ep' => 63, 'code' => '262', 'msg_id' => 154, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAOaaYbWgZefnLvb56HvJse0LhWRh9gAAjQOAAIuJnFLqC6sDshZwR46BA'],
            ['ep' => 64, 'code' => '263', 'msg_id' => 155, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAObaYbWjx7Rlw-7Dai9FEcNAAE5hcDWAALjDgACbdxxS_Lp4FEvAz2yOgQ'],
            ['ep' => 65, 'code' => '264', 'msg_id' => 156, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAOcaYbWnHtSDZVa-8uFLa6NyuKX1xIAAsIHAALPAXlL7CzhhTfPDoE6BA'],
            ['ep' => 66, 'code' => '265', 'msg_id' => 158, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAOfaYbWn_g-LNE4dGAC-p3cz79xkI5AAI1CAACGEQYShuKjoj3v1aUOgQ'],
            ['ep' => 67, 'code' => '266', 'msg_id' => 159, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAOgaYbWn_i_R-HRgAvqd3M-_cZCOQACNQgAAhpEGErLio6I979WlDoE'],
            ['ep' => 68, 'code' => '267', 'msg_id' => 160, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAOhaYbWn_i-LNE4dGAC-p3cz79xkI5AAI1CAACGEQYShuKjoj3v1aUOgQ'],
            ['ep' => 69, 'code' => '268', 'msg_id' => 161, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAOiaYbWn_i9R-HRgAvqd3M-_cZCOQACNQgAAhpEGErLio6I979WlDoE'],
            ['ep' => 70, 'code' => '269', 'msg_id' => 162, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAOjaYbWn_i8LNE4dGAC-p3cz79xkI5AAI1CAACGEQYShuKjoj3v1aUOgQ'],
            ['ep' => 71, 'code' => '270', 'msg_id' => 163, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAOkaYbWx-h_XmBbe_NIn7fT6X5m6Ig-Li3NAAKNCQACISFRS4YJxDM4bQj6OgQ'],
            ['ep' => 72, 'code' => '271', 'msg_id' => 164, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAOlaYbWx_NIn7fT6X5m6Ig-Li3NAAKNCQACISFRS4YJxDM4bQj6OgQ'],
            ['ep' => 73, 'code' => '272', 'msg_id' => 165, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAOmaYbWx-f-XmBbe_NIn7fT6X5m6Ig-Li3NAAKNCQACISFRS4YJxDM4bQj6OgQ'],
            ['ep' => 74, 'code' => '273', 'msg_id' => 166, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAOnaYbWx9In7fT6X5m6Ig-Li3NAAKNCQACISFRS4YJxDM4bQj6OgQ'],
            ['ep' => 75, 'code' => '274', 'msg_id' => 167, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAOoaYbWx8f-XmBbe_NIn7fT6X5m6Ig-Li3NAAKNCQACISFRS4YJxDM4bQj6OgQ'],
            ['ep' => 76, 'code' => '275', 'msg_id' => 345, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAOqaYbWXOXrjeLXpPogI28-Q2da_UaIAAtYLAAJMh7FLR2kPWRmE9zI6BA'],
            ['ep' => 77, 'code' => '276', 'msg_id' => 168, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAOpaYbXOXrjeLXpPogI28-Q2da_UaIAAtYLAAJMh7FLR2kPWRmE9zI6BA'],
            ['ep' => 78, 'code' => '277', 'msg_id' => 169, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAOpaYbXOXrjeLXpPogI28-Q2da_UaIAAtYLAAJMh7FLR2kPWRmE9zI6BA'],
            ['ep' => 79, 'code' => '278', 'msg_id' => 348, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAOraYbXU5sR22J9HLlS2JjJ6G34DIkAAq4NAALECdBLAe4aswMAAToxOgQ'],
            ['ep' => 80, 'code' => '279', 'msg_id' => 170, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAOqaYbXQzh3pW_3DdVgtpzvWZCDsOgAAooFAAJIIhlLGPfrEp2GVQw6BA'],
            ['ep' => 81, 'code' => '280', 'msg_id' => 171, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAOraYbXU5sR22J9HLlS2JjJ6G34DIkAAq4NAALECdBLAe4aswMAAToxOgQ'],
        ];

        foreach ($episodes as $data) {
            SerialEpisode::updateOrCreate(
                ['serial_id' => $serial->id, 'episode_number' => $data['ep']],
                ['file_id' => $data['file_id']]
            );
            Movie::updateOrCreate(
                ['code' => $data['code']],
                [
                    'name' => "{$serialName} {$data['ep']}-qism",
                    'channel_id' => $channelId,
                    'message_id' => $data['msg_id'],
                    'file_id' => $data['file_id'],
                ]
            );
        }
    }

    private function seedUmarIbnHattob()
    {
        $serialName = "Umar ibn Hattob";
        $channelId = "-1003605893088";
        $serial = Serial::firstOrCreate(['name' => $serialName]);

        $episodes = [
            ['ep' => 1,  'code' => '300', 'msg_id' => 329, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBSWmpDeW6RjkkfUWTDKq9tOVCTjhmAAJ8BQAC5zjZSPPScOv5lSrqOgQ'],
            ['ep' => 2,  'code' => '301', 'msg_id' => 330, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBSmmpDeXfafNP2Pla3DpAuYLm9ioBAAI5BwACM7DhSFV0Ch1_EOC2OgQ'],
            ['ep' => 3,  'code' => '302', 'msg_id' => 331, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBS2mpDeWl_bNwqkNarrkxZ7Y0t_qpAAJJBwACM7DhSB-IX50X_XHGOgQ'],
            ['ep' => 4,  'code' => '303', 'msg_id' => 332, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBTGmpDeXmMw_n6auuG59sNhBu2haDAAKFBQAC5zjZSE5tvJGviM4iOgQ'],
            ['ep' => 5,  'code' => '304', 'msg_id' => 333, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBTWmpDeXwNwNtQFlU4vvcmF3mqCNOAAKDBwACM7DhSPZa0GFZgENZOgQ'],
            ['ep' => 6,  'code' => '305', 'msg_id' => 334, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBTmmpDeVAZZH2K840X1JHvnGskez4AAKTBQAC5zjZSG1ZzWZ8Gp_1OgQ'],
            ['ep' => 7,  'code' => '306', 'msg_id' => 335, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBT2mpDeX-CkXj3KIYyUIEpQ94iLyPAAKJBwACM7DhSAQyXP5N58KGOgQ'],
            ['ep' => 8,  'code' => '307', 'msg_id' => 336, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBUGmpDeVDc8ZnUneypq-ej8hnwl6tAAKPBwACM7DhSIPssKG6kAABYToE'],
            ['ep' => 9,  'code' => '308', 'msg_id' => 337, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBUWmpDeXXWrG3idunN44TXbSIOVkuAAKTBwACM7DhSJ8bPA3rQj0cOgQ'],
            ['ep' => 10, 'code' => '309', 'msg_id' => 338, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBUmmpDeV4xpbhR4YSmb5Ee0bzQlzhAALABQAC5zjZSMSF7dtNu5jDOgQ'],
            ['ep' => 11, 'code' => '310', 'msg_id' => 339, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBU2mpDeV-cOUoCWq6kCowz-RtIQrjAALEBQAC5zjZSJtYYxjtn-AJOgQ'],
            ['ep' => 12, 'code' => '311', 'msg_id' => 340, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBVGmpDeVRoFyrfuDxfFvWSn6o_aMRAAKgBwACM7DhSBJfn19HLex9OgQ'],
            ['ep' => 13, 'code' => '312', 'msg_id' => 341, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBVWmpDeVQfWEPrLSMe3b1IzCeruBCAAKkBwACM7DhSO-G84lPpBrGOgQ'],
            ['ep' => 14, 'code' => '313', 'msg_id' => 342, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBVmmpDeUNREby3_1XiikkTceDf02hAAL5BQAC5zjZSF0-9KIUdpleOgQ'],
            ['ep' => 15, 'code' => '314', 'msg_id' => 343, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBV2mpDeUqGN27noSRzcZ3FrM6wKtUAAL8BQAC5zjZSDkGaxV7SsBQOgQ'],
            ['ep' => 16, 'code' => '315', 'msg_id' => 344, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBWGmpDeVfCymkvhhYL1PHMBVTWxSgAAKvBwACM7DhSBX7iN7LtSxCOgQ'],
            ['ep' => 17, 'code' => '316', 'msg_id' => 345, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBWWmpDeUB5eRfs8Sd_6iKlVvp18OBAAKxBwACM7DhSFW9lpSm1TakOgQ'],
            ['ep' => 18, 'code' => '317', 'msg_id' => 346, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBWmmpDeXnUxC28bBwm050_3o1bYSZAAK1BwACM7DhSFDqLNIjyiJlOgQ'],
            ['ep' => 19, 'code' => '318', 'msg_id' => 347, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBW2mpDeXGLnaIIKUyuEWnZ0KUNjSUAALIBwACM7DhSO712c4684w0OgQ'],
            ['ep' => 20, 'code' => '319', 'msg_id' => 348, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBXGmpDeVaDDQdLSZphDGq_3FpQ5RWAALJBwACM7DhSM4aZRaXk-s6OgQ'],
            ['ep' => 21, 'code' => '320', 'msg_id' => 349, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBXWmpDeUX4qaROraoFe8AASnD0eBLzQACHgYAAuc42UgTrzr8ug_LYToE'],
            ['ep' => 22, 'code' => '321', 'msg_id' => 350, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBXmmpDeX3E5Yuins_EvzjgbwPmccmAAIfBgAC5zjZSMN9HW_CNlPdOgQ'],
            ['ep' => 23, 'code' => '322', 'msg_id' => 351, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBX2mpDeU5V6XeTTYxzEycTkDhOG-RAALPBwACM7DhSFLu_R5HwudmOgQ'],
            ['ep' => 24, 'code' => '323', 'msg_id' => 352, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBYGmpDeU4X5BIGH99Ox_bi1lYTvncAALRBwACM7DhSNiJYWpk1XSJOgQ'],
            ['ep' => 25, 'code' => '324', 'msg_id' => 353, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBYWmpDeXwkIcUBUdXYHOuj2SBX59AAALSBwACM7DhSP9zAovsIyU5OgQ'],
            ['ep' => 26, 'code' => '325', 'msg_id' => 354, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBYmmpDeXUm1fHtTk35gxHc8SxWAU3AALUBwACM7DhSNbvHug88HW6OgQ'],
            ['ep' => 27, 'code' => '326', 'msg_id' => 355, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBY2mpDeWAKdYwsTkPYAbQAAEvVzQ6OwACIAYAAuc42UgMjB8jVJrmEzoE'],
            ['ep' => 28, 'code' => '327', 'msg_id' => 359, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBZmmpDfZYKifAqkEoBom3_nr2SF1SAALdBwACM7DhSHAmAX4-YtWyOgQ'],
            ['ep' => 29, 'code' => '328', 'msg_id' => 360, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBZGmpDfYLoRYseTvkrA4s3y4F1kJZAAJgBgAC5zjhSK6-SYkpSnLGOgQ'],
            ['ep' => 30, 'code' => '329', 'msg_id' => 361, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBZWmpDfZ0I6b8FoUpL6k3a2i1XjTjAALgBwACM7DhSOtTCZX5AAGk-DoE'],
        ];

        foreach ($episodes as $data) {
            SerialEpisode::updateOrCreate(
                ['serial_id' => $serial->id, 'episode_number' => $data['ep']],
                ['file_id' => $data['file_id']]
            );
            Movie::updateOrCreate(
                ['code' => $data['code']],
                [
                    'name' => "{$serialName} {$data['ep']}-qism",
                    'channel_id' => $channelId,
                    'message_id' => $data['msg_id'],
                    'file_id' => $data['file_id'],
                ]
            );
        }
    }

    private function seedDengizHukumdori()
    {
        $serialName = "Dengiz hukumdori";
        $channelId = "-1003605893088";
        $serial = Serial::firstOrCreate(['name' => $serialName]);

        $episodes = [
            ['ep' => 1,  'code' => '342', 'msg_id' => 374, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBdmmsfPcJYodbFo6y1UDnTLtONdSSAAJOBQAC2wABmEq_VsaPLacdBjoE'],
            ['ep' => 2,  'code' => '342-2', 'msg_id' => 374, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBdmmsfPcJYodbFo6y1UDnTLtONdSSAAJOBQAC2wABmEq_VsaPLacdBjoE'], 
            ['ep' => 3,  'code' => '343', 'msg_id' => 375, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBd2msfPcnUl5DMum-JQTvgqPSUk4tAAJPBQAC2wABmEoDMBIHL7TaXzoE'],
            ['ep' => 4,  'code' => '344', 'msg_id' => 376, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBeGmsfPdin35h2hFo51yqB7mVRrwYAAJQBQAC2wABmErvYWW549H0tToE'],
            ['ep' => 5,  'code' => '345', 'msg_id' => 377, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBeWmsfPcmp4U6yNqZi1f7OqnTLMjlAAJRBQAC2wABmEqDzOt-2z1X5zoE'],
            ['ep' => 6,  'code' => '346', 'msg_id' => 378, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBemmsfPdBxzPOwucEQkBCpVj9QiQcAAJVBQAC2wABmEotfU931fQR9zoE'],
            ['ep' => 7,  'code' => '347', 'msg_id' => 379, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBe2msfPdS5j1IF6sdv33dl53duGg-AAJYBQAC2wABmEpPGOl8MUNZjToE'],
            ['ep' => 8,  'code' => '348', 'msg_id' => 380, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBfGmsfPfXDvjoQbqE3BrJxwUkKrLiAAJaBQAC2wABmEoxvUv5YBHySDoE'],
            ['ep' => 9,  'code' => '349', 'msg_id' => 381, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBfWmsfPcMaDhBUua0mL-jBC61qnjWAAJiBQAC2wABmEpwV_adh1VvSDoE'],
            ['ep' => 10, 'code' => '350', 'msg_id' => 382, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBfmmsfPf1aYqYmunKqVo2QO8HaleTAAJlBQAC2wABmEpr-n78IMxZqToE'],
            ['ep' => 11, 'code' => '351', 'msg_id' => 383, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBf2msfPfcCxb2piKggUSPSwI3zqw5AAJ1BQAC2wABmErwhPe-2j9dfToE'],
            ['ep' => 12, 'code' => '352', 'msg_id' => 384, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBgGmsfPe62K6MkZmJV5Uj_tBixQTuAAJ6BQAC2wABmErrflJSnT8AARw6BA'],
            ['ep' => 13, 'code' => '353', 'msg_id' => 385, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBgWmsfPcJLH9l18sCL3XLMV7pUZK5AAKEBQAC2wABmErhLal9G4njCjoE'],
            ['ep' => 14, 'code' => '354', 'msg_id' => 386, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBgmmsfPc-RaklVCst8UPNQUizUzovAAKKBQAC2wABmEqzUKFfdeqw7zoE'],
            ['ep' => 15, 'code' => '355', 'msg_id' => 387, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBg2msfPfN0vDqp80O_SzhDw5IDvQzAAKVBQAC2wABmEo3scTxI_y-jToE'],
            ['ep' => 16, 'code' => '356', 'msg_id' => 388, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBhGmsfPfjkHODRAEDsKhSOEM1H6-sAAKbBQAC2wABmEq3on6EdSR-cToE'],
            ['ep' => 17, 'code' => '357', 'msg_id' => 389, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBhWmsfPevMsyBTY-iZO-sAZ0AAXa_hgACowUAAtsAAZhKGMfRjG_9MH46BA'],
            ['ep' => 18, 'code' => '358', 'msg_id' => 390, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBhmmsfPc8ORsxHt0QnnNBdowBXVQ_AAKvBQAC2wABmEqQg0FndRDUeToE'],
            ['ep' => 20, 'code' => '360', 'msg_id' => 391, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBh2msfPc3YDionWd0jkuM8ZE8JRiAAALPBQAC2wABmErwc_7Lm9D-yToE'],
            ['ep' => 21, 'code' => '361', 'msg_id' => 392, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBiGmsfPdc4jd43-UFeItdEgdkboHpAALjBQAC2wABmEpJ5tDkCRiGLDoE'],
            ['ep' => 22, 'code' => '362', 'msg_id' => 393, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBiWmsfPfaMXNligNSX6-QOi8ymz7GAAL2BQAC2wABmErj0gr_dTznUjoE'],
            ['ep' => 23, 'code' => '363', 'msg_id' => 394, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBimmsfPeIEy8jqTahbdwITW7r3QlWAAL9BQAC2wABmEoJKnF-kElMGToE'],
            ['ep' => 24, 'code' => '364', 'msg_id' => 395, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBi2msfPdeGnTOF2tY3jSCRwLiSLuyAAMGAALbAAGYSjKWqkpedZzsOgQ'],
            ['ep' => 25, 'code' => '365', 'msg_id' => 396, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBjGmsfPf-eY0KfP12cG8gReFPtW0WAAIFBgAC2wABmEoTQO63TwMvMzoE'],
            ['ep' => 26, 'code' => '366', 'msg_id' => 397, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBjWmsfPfUoCSaxdabiLqe8Fb6ptWeAAIGBgAC2wABmEpT6PQ5RbRXEToE'],
            ['ep' => 27, 'code' => '367', 'msg_id' => 398, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBjmmsfPe-uROAuRdHt6vI6MkuJ3yTAAIIBgAC2wABmErIOyEZAAGQIhg6BA'],
            ['ep' => 28, 'code' => '368', 'msg_id' => 399, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBj2msfPdQcTJRVh430mvr3nrE03xxAAILBgAC2wABmEpMjhyavhh1hToE'],
            ['ep' => 29, 'code' => '369', 'msg_id' => 400, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBkGmsfPeJtk6aDUqSh46Jpxv9xr2fAAIOBgAC2wABmEpsX7roC9Ht1joE'],
            ['ep' => 30, 'code' => '370', 'msg_id' => 401, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBkWmsfPdEs7nHtWYyFhJSBPxf8ixaAAIPBgAC2wABmErOw5Kq3LuCwzoE'],
            ['ep' => 31, 'code' => '371', 'msg_id' => 402, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBkmmsfPcp6XpiBtqqX_rfcsSTiryjAAKICAACg0KoSs8PEKNJBJwROgQ'],
            ['ep' => 32, 'code' => '372', 'msg_id' => 403, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBk2msfPeX3svOdA6gKzcfMVr498EtAAKeCAACg0KoSkWBtOID1o0HOgQ'],
            ['ep' => 33, 'code' => '373', 'msg_id' => 404, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBlGmsfPeqWAgQ9dQL4O8LEmJaZSV8AAKgCAACg0KoSvawKeRZJ2LuOgQ'],
            ['ep' => 34, 'code' => '374', 'msg_id' => 405, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBlWmsfPcqlXs5101_jGs4aNIUq9t7AALfCAACg0KoSv0PzPsD2fAROgQ'],
            ['ep' => 35, 'code' => '375', 'msg_id' => 406, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBlmmsfPfgr7twanWBD-Y7fwj08UVQAALjCAACg0KoSgxbPp-iK9WjOgQ'],
            ['ep' => 36, 'code' => '376', 'msg_id' => 407, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBl2msfPdf4t2MvqHRikPHD3weDgsWAAL2CAACg0KoSl6Qz3HptjGmOgQ'],
            ['ep' => 37, 'code' => '377', 'msg_id' => 408, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBmGmsfPe7hIqkaoQgrlJQer3AGQoAA_gIAAKDQqhKxxYrARNXAAFOOgQ'],
            ['ep' => 38, 'code' => '378', 'msg_id' => 409, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBmWmsfPckkvYfoKoL_F5NNKMn8zkhAAL5CAACg0KoSrxB9WyZNUSyOgQ'],
            ['ep' => 39, 'code' => '379', 'msg_id' => 410, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBmmmsfPdesfqUHgE16Dipefn7FcoAA_oIAAKDQqhKEfQCouZQov46BA'],
            ['ep' => 40, 'code' => '380', 'msg_id' => 411, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBm2msfPc9jpwopvzhoQdJx-Xmq7g2AAL7CAACg0KoSv1mLpUDk5fKOgQ'],
            ['ep' => 41, 'code' => '381', 'msg_id' => 412, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBnGmsfPfSTCbPEpRTiVH2VsAvbz9YAAL8CAACg0KoShPpjZecQ5b8OgQ'],
            ['ep' => 42, 'code' => '382', 'msg_id' => 413, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBnWmsfPeCy7-lWP5U9dSqdDCM_KC0AAL9CAACg0KoStX5O-_6EffCOgQ'],
            ['ep' => 43, 'code' => '383', 'msg_id' => 414, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBnmmsfPfsmYpV3uUnHq2ICsS65C5qAAIFCQACg0KoSrdrtPp_GRwxOgQ'],
            ['ep' => 44, 'code' => '384', 'msg_id' => 415, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBn2msfPcNMYTWLD_LVLr_T0e0xpF9AAIPCQACg0KoSr_jBexWfeVmOgQ'],
            ['ep' => 45, 'code' => '385', 'msg_id' => 416, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBoGmsfPdn2zVWNztVeLuFLqn8kd1pAAIUCQACg0KoSgK62s8PZXJvOgQ'],
            ['ep' => 46, 'code' => '386', 'msg_id' => 417, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBoWmsfPeW8Lfrg4CSMwWrsYXc_0nPAAIeCQACg0KoStIufW0bb8tBOgQ'],
            ['ep' => 47, 'code' => '387', 'msg_id' => 418, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBommsfPcXf-X2lnVM22Jat8_XqctSAAIiCQACg0KoSi1ZuUIBZdwvOgQ'],
            ['ep' => 48, 'code' => '388', 'msg_id' => 419, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBo2msfPf-KLIvIOKtkj90MPONLcULAAIlCQACg0KoSp50e2YsdB3eOgQ'],
            ['ep' => 49, 'code' => '389', 'msg_id' => 420, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBpGmsfPcU7OnqeCT8FcNfg9OsZrsdAAImCQACg0KoSklKclb1DPOLOgQ'],
            ['ep' => 50, 'code' => '390', 'msg_id' => 421, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBpWmsfPcI45Z_SL3wH17cJzGu2ZLFAAIpCQACg0KoSmjyeO-fE3R7OgQ'],
            ['ep' => 51, 'code' => '391', 'msg_id' => 422, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBpmmsfPd_1y1Vlo7DMPaS-TD-_N_cAAItCQACg0KoSoOtcQ5BK-ujOgQ'],
        ];

        foreach ($episodes as $data) {
            SerialEpisode::updateOrCreate(
                ['serial_id' => $serial->id, 'episode_number' => $data['ep']],
                ['file_id' => $data['file_id']]
            );
            Movie::updateOrCreate(
                ['code' => $data['code']],
                [
                    'name' => "{$serialName} {$data['ep']}-qism",
                    'channel_id' => $channelId,
                    'message_id' => $data['msg_id'],
                    'file_id' => $data['file_id'],
                ]
            );
        }
    }

    private function seedTaxtlarOyini()
    {
        $serialName = "Taxtlar o'yini";
        $channelId = "-1003605893088";
        $serial = Serial::firstOrCreate(['name' => $serialName]);

        $episodes = [
            ['ep' => 1,  'code' => '281', 'msg_id' => 427, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBq2ms0pEcIhs6gsz06zyfvivrj-v_AAKHpwACVMhoSaA2-WCLl1yGOgQ'],
            ['ep' => 2,  'code' => '282', 'msg_id' => 428, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBrGms0pF4l6eFSCUBQE7A5F7lQyQWAAKIpwACVMhoSThuIX70sniIOgQ'],
            ['ep' => 3,  'code' => '283', 'msg_id' => 429, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBrWms0pFmTODaV1eg5fnTDmrBT-31AAKKpwACVMhoSZusNNdrnRN-OgQ'],
            ['ep' => 4,  'code' => '284', 'msg_id' => 430, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBrmms0pEEfCIX84vk5pqRuX8j2UTwAAKNpwACVMhoSTxgyE_JX7T6OgQ'],
            ['ep' => 5,  'code' => '285', 'msg_id' => 431, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBr2ms0pHnOdmOcVGbo6_5xVgUZu-YAAKOpwACVMhoScQ7uRNakdoTOgQ'],
            ['ep' => 6,  'code' => '286', 'msg_id' => 432, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBsGms0pGtjHwz96neLDVqp9_LIjYUAAKRpwACVMhoSZ1ArYN-4BLPOgQ'],
            ['ep' => 7,  'code' => '287', 'msg_id' => 433, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBsWms0pHRO3Q8zT9PPg_4FMwv89ZDAAKTpwACVMhoSbWoz0Hjso3xOgQ'],
            ['ep' => 8,  'code' => '288', 'msg_id' => 434, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBsmms0pFQJaJU_jByD_2BmNq8LvHTAAKUpwACVMhoSVY0b5hwVD-8OgQ'],
            ['ep' => 9,  'code' => '289', 'msg_id' => 435, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBs2ms0pEi9KD_t4DvYtQVCq21kRjoAAKVpwACVMhoSZ59HRu0flONOgQ'],
            ['ep' => 10, 'code' => '290', 'msg_id' => 436, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBtGms0pFpBAG39XUHTbx5JX42FGw1AAKXpwACVMhoSQPkFgS7suZSOgQ'],
        ];

        foreach ($episodes as $data) {
            SerialEpisode::updateOrCreate(
                ['serial_id' => $serial->id, 'episode_number' => $data['ep']],
                ['file_id' => $data['file_id']]
            );
            Movie::updateOrCreate(
                ['code' => $data['code']],
                [
                    'name' => "{$serialName} {$data['ep']}-qism",
                    'channel_id' => $channelId,
                    'message_id' => $data['msg_id'],
                    'file_id' => $data['file_id'],
                ]
            );
        }
    }
}
