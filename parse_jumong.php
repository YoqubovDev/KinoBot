<?php

$logFile = '/home/shehroz/Projects/kino-bot/storage/logs/laravel.log';
$handle = fopen($logFile, 'r');

$jumongEpisodes = [];

if ($handle) {
    while (($line = fgets($handle)) !== false) {
        if (strpos($line, 'Jumong') !== false && strpos($line, 'Telegram update:') !== false) {
            $jsonStart = strpos($line, '{"update_id"');
            if ($jsonStart !== false) {
                $jsonStr = substr($line, $jsonStart);
                $update = json_decode($jsonStr, true);
                
                if (isset($update['message'])) {
                    $msg = $update['message'];
                    $caption = $msg['caption'] ?? '';
                    $fileId = $msg['video']['file_id'] ?? null;
                    $forwardMsgId = $msg['forward_from_message_id'] ?? null;
                    $forwardChatId = $msg['forward_from_chat']['id'] ?? null;
                    
                    // Extract episode number
                    $ep = null;
                    if (preg_match('/Qism:\s*(\d+)/u', $caption, $epMatches)) {
                        $ep = $epMatches[1];
                    }
                    
                    // Extract kino kodi
                    $code = null;
                    if (preg_match('/kodi:\s*(\d+)/ui', $caption, $codeMatches)) {
                        $code = $codeMatches[1];
                    }
                    
                    if ($ep && $fileId && $code) {
                        $jumongEpisodes[$ep] = [
                            'ep' => (int)$ep,
                            'code' => $code,
                            'msg_id' => $forwardMsgId,
                            'file_id' => $fileId,
                            'channel_id' => $forwardChatId
                        ];
                    }
                }
            }
        }
    }
    fclose($handle);
}

ksort($jumongEpisodes);

echo "<?php\n\nuse App\Models\Serial;\nuse App\Models\SerialEpisode;\nuse App\Models\Movie;\n\n";
echo "\$serialName = \"Jumong afsonasi\";\n";
echo "\$episodes = " . var_export(array_values($jumongEpisodes), true) . ";\n\n";
echo "\$serial = Serial::firstOrCreate(['name' => \$serialName]);\n\n";
echo "foreach (\$episodes as \$data) {\n";
echo "    SerialEpisode::updateOrCreate(\n";
echo "        ['serial_id' => \$serial->id, 'episode_number' => \$data['ep']],\n";
echo "        ['file_id' => \$data['file_id']]\n";
echo "    );\n\n";
echo "    Movie::updateOrCreate(\n";
echo "        ['code' => \$data['code']],\n";
echo "        [\n";
echo "            'name' => \"{\$serialName} {\$data['ep']}-qism\",\n";
echo "            'channel_id' => \$data['channel_id'],\n";
echo "            'message_id' => \$data['msg_id'],\n";
echo "            'file_id' => \$data['file_id'],\n";
echo "        ]\n";
echo "    );\n";
echo "}\n\n";
echo "echo \"Success: Added {\$serialName} episodes 1-\" . count(\$episodes) . \".\\n\";\n";
