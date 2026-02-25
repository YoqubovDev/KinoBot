<?php

use App\Models\Serial;
use App\Models\SerialEpisode;
use App\Models\Movie;

$serialName = "Jumong afsonasi";
$channelId = "-1003605893088";

// Logdan olingan ma'lumotlar
$episodes = [
    ['ep' => 1, 'code' => '200', 'msg_id' => 93, 'file_id' => 'BAACAgIAAxkBAAPeaYbXzYr_4nypHlTD-JmvmAo8ynQAApwRAAKYhVBI7UL00cm2NLA6BA'],
    ['ep' => 2, 'code' => '201', 'msg_id' => 94, 'file_id' => 'BAACAgIAAxkBAAPfaYbXzXBpoRClTT-9oMGwQX6JRdMAAqARAAKYhVBIxV2MOEm4WIQ6BA'],
    ['ep' => 3, 'code' => '202', 'msg_id' => 95, 'file_id' => 'BAACAgIAAxkBAAPgaYbXzepGVwABeJjnig2EfvFfjxOCAAKhEQACmIVQSEJMb3VUJjEJOgQ'],
    ['ep' => 4, 'code' => '203', 'msg_id' => 96, 'file_id' => 'BAACAgIAAxkBAAPhaYbXzaoyPKcw1mbo3Winf4nv8xYAAqMRAAKYhVBI3fegz7vsxPM6BA'],
    ['ep' => 5, 'code' => '204', 'msg_id' => 97, 'file_id' => 'BAACAgIAAxkBAAPiaYbXzTaLWcTZxBKBTajOuCFRBIcAAjYKAAIik0lLmI69Ty0fuWc6BA'],
    ['ep' => 6, 'code' => '205', 'msg_id' => 98, 'file_id' => 'BAACAgIAAxkBAAPjaYbXze7L1MKyT5y5imHeZupH8lQAAk0JAAIik1FLCtM2lYu4eAM6BA'],
    ['ep' => 7, 'code' => '206', 'msg_id' => 99, 'file_id' => 'BAACAgIAAxkBAAPkaYbXzcYyCLccsuBgJc3iqvrWBD0AAiAIAAJGclBL6cUiYNeco0I6BA'],
    ['ep' => 8, 'code' => '207', 'msg_id' => 100, 'file_id' => 'BAACAgIAAxkBAAPlaYbXzag_PGhr_H5lIqscythNOoUAAj0MAAL2V1BLLoY1M364xpE6BA'],
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
    ['ep' => 44, 'code' => '243', 'msg_id' => 135, 'file_id' => 'BAACAgIAAxkBAAIBCGmG1801ciBKUc1ju4H_-MhU-yz4AAI5CgACuGpoS1J2Hn43t1M3OgQ'],
    ['ep' => 45, 'code' => '244', 'msg_id' => 136, 'file_id' => 'BAACAgIAAxkBAAIBCWmG180akAFrIYA4zkcWkDaoalq_AAJUCAACwUVpS64ZMIPsy4G_OgQ'],
    ['ep' => 46, 'code' => '245', 'msg_id' => 137, 'file_id' => 'BAACAgIAAxkBAAIBCmmG182SocqZHBI3t3MlhqMBfX6vAAI0CgACwUVpSwQwwHJp8TMjOgQ'],
    ['ep' => 47, 'code' => '246', 'msg_id' => 138, 'file_id' => 'BAACAgIAAxkBAAIBC2mG182uVC6fffoYKi2OFIY6H4ypAAKWDwACLiZpS7l2YHJryw4rOgQ'],
    ['ep' => 48, 'code' => '247', 'msg_id' => 139, 'file_id' => 'BAACAgIAAxkBAAIBDGmG182eo5uYA5ZQ4J_tsrHIUN2-AAIDBwACLiZxS0U84PaXBUHnOgQ'],
    ['ep' => 49, 'code' => '248', 'msg_id' => 140, 'file_id' => 'BAACAgIAAxkBAAIBDWmG181I5bR9WRGWqgU9vq0_omWtAAKADQACwUVpS37Z73AGerZeOgQ'],
    ['ep' => 50, 'code' => '249', 'msg_id' => 141, 'file_id' => 'BAACAgIAAxkBAAIBDmmG1814GbYmu1Q1MS-hWmiP0WvfAAKBBwACLiZxS_BxR4dGe0YpOgQ'],
    ['ep' => 51, 'code' => '250', 'msg_id' => 142, 'file_id' => 'BAACAgIAAxkBAAIBD2mG182QnqiJkW_1BFZcK-_xUpmeAALnCAACvHZwSwxOE4FHMg-fOgQ'],
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
];

$serial = Serial::firstOrCreate(['name' => $serialName]);

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

echo "Success: Added {$serialName} episodes.\n";
