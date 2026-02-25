<?php

use App\Models\Serial;
use App\Models\SerialEpisode;
use App\Models\Movie;

$serialName = "G'assol 2-fasl";
$channelId = "-1003605893088";

$episodes = [
    ['ep' => 1, 'code' => '146', 'msg_id' => 309, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBNWmRunxk4iKx7NwylhS2LqrB6kfHAAKjkgAC6U6JSIHHpEHI_1EHOgQ'],
    ['ep' => 2, 'code' => '147', 'msg_id' => 311, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBN2mRunxoW3wUpORjqmKTgzFwq21iAAIZlgAC6U6JSJeYMq8fpOTGOgQ'],
    ['ep' => 3, 'code' => '148', 'msg_id' => 312, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBNmmRuny1harg_ALY1uKecf8wEGpIAAKxkgAC6U6JSHAXP98ILxGBOgQ'],
    ['ep' => 4, 'code' => '149', 'msg_id' => 313, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBOWmRuqe6X_MZmCeMB4K2O2nX37qKAAIalgAC6U6JSLiH5PEYXEo7OgQ'],
    ['ep' => 5, 'code' => '150', 'msg_id' => 314, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBOmmRuqfvzT6gZ0hl7LtsyJ1khVT_AAIclgAC6U6JSI6qDSiU0-iwOgQ'],
    ['ep' => 6, 'code' => '151', 'msg_id' => 315, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBO2mRuqelxmAaIzZFD7TF_GYQXoFUAAIelgAC6U6JSNzpkPQ_Oys1OgQ'],
    ['ep' => 7, 'code' => '152', 'msg_id' => 316, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBPGmRuqfrFefrkMlO64NeQK7MDG05AAIflgAC6U6JSA7wvE-kpSNfOgQ'],
    ['ep' => 8, 'code' => '153', 'msg_id' => 317, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBPWmRuqdQPfuM_9Pxge4Y3iuOfHi8AAIhlgAC6U6JSBFt31Xm8f2QOgQ'],
    ['ep' => 9, 'code' => '154', 'msg_id' => 318, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBPmmRuqdl2pUOT74AAZ4SU0nThIPFQQACJJYAAulOiUjBpfQH-6-s0ToE'],
    ['ep' => 10, 'code' => '155', 'msg_id' => 319, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBP2mRuqcBwVFzm9MY2IfWVlbHoM41AAIolgAC6U6JSGtHuXIn-eSQOgQ'],
];

$serial = Serial::firstOrCreate(['name' => $serialName]);

foreach ($episodes as $data) {
    // Add to serial_episodes
    SerialEpisode::updateOrCreate(
        [
            'serial_id' => $serial->id,
            'episode_number' => $data['ep']
        ],
        [
            'file_id' => $data['file_id']
        ]
    );

    // Add to movies for code search
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

echo "Success: Added {$serialName} episodes 1-10.\n";
