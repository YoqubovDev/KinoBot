<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Serial;
use App\Models\SerialEpisode;
use App\Services\TelegramApi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class TelegramController extends Controller
{
    private TelegramApi $telegram;

    public function __construct(TelegramApi $telegram)
    {
        $this->telegram = $telegram;
    }

    public function setWebhook(Request $request)
    {
        $url = rtrim(config('app.url'), '/') . '/api/webhook';

        return response()->json(
            $this->telegram->call('setWebhook', ['url' => $url])->json()
        );
    }

    public function removeWebhook(Request $request)
    {
        return response()->json(
            $this->telegram->call('deleteWebhook')->json()
        );
    }

    public function handle(Request $request)
    {
        $update = $request->all();

        if (isset($update['callback_query'])) {
            return $this->handleCallbackQuery($update['callback_query']);
        }

        if (!isset($update['message']) || !isset($update['message']['text'])) {
            return response()->json(['ok' => true]);
        }

        $chatId = $update['message']['chat']['id'];
        $text = trim($update['message']['text']);

        if (!$this->checkSubscription($chatId)) {
            $this->sendSubscriptionMessage($chatId);
            return response()->json(['ok' => true]);
        }

        // /start 123 format or /start
        if (str_starts_with($text, '/start')) {
            $parts = explode(' ', $text);
            if (isset($parts[1]) && trim($parts[1]) !== '') {
                $text = $parts[1];
            } else {
                $this->sendWelcomeMessage($chatId);
                return response()->json(['ok' => true]);
            }
        }

        // Eski 'Serial +' yoki yangi tillar bo'yicha handler
        $languages = [
            "🇺🇿 O'zbek tili" => 'uz',
            "🇷🇺 Rus tili" => 'ru',
            "🇺🇸 Ingliz tili" => 'en'
        ];

        if ($text === 'Serial +') {
            $this->sendWelcomeMessage($chatId);
            return response()->json(['ok' => true]);
        }

        if (array_key_exists($text, $languages)) {
            $this->sendSerialsListByLangMessage($chatId, $languages[$text]);
            return response()->json(['ok' => true]);
        }

        $searchTerm = trim($text);

        if (ctype_digit($searchTerm)) {
            $movie = Movie::where('code', $searchTerm)->first();
            if (!$movie) {
                $this->sendMessage($chatId, "😕 Kino topilmadi.");
                return response()->json(['ok' => true]);
            }
            $this->sendMovieVideo($chatId, $movie);
        } else {
            $movies = Movie::where('name', 'like', '%' . $searchTerm . '%')->limit(10)->get();

            if ($movies->isEmpty()) {
                $this->sendMessage($chatId, "😕 Qidiruvingiz bo'yicha kino topilmadi.");
                return response()->json(['ok' => true]);
            }

            if ($movies->count() === 1) {
                $this->sendMovieVideo($chatId, $movies->first());
            } else {
                $buttons = [];
                foreach ($movies as $movie) {
                    $buttons[][] = [
                        'text' => $movie->name,
                        'callback_data' => 'movie_' . $movie->code
                    ];
                }

                $this->telegram->call('sendMessage', [
                    'chat_id' => $chatId,
                    'text' => "🔍 Quyidagi kinolardan birini tanlang:",
                    'reply_markup' => json_encode(['inline_keyboard' => $buttons]),
                ]);
            }
        }

        return response()->json(['ok' => true]);
    }

    private function sendMovieVideo($chatId, $movie)
    {
        $movie->increment('views');
        $movie->refresh();

        $channelUsername = '@kin0meda';

        $caption =
            "🔍 Kino kodi: {$movie->code}\n" .
            "🎬 Kanal: {$channelUsername}\n" .
            "🤖 Bot: @" . config('telegram.bot_username') . "\n" .
            "👁 Ko'rishlar: {$movie->views} ta";

        $keyboard = [
            'inline_keyboard' => [
                [
                    [
                        'text' => '📤 Ulashish',
                        'switch_inline_query' => $movie->code
                    ]
                ]
            ]
        ];

        $sent = false;

        if ($movie->message_id && $movie->channel_id) {
            $response = $this->telegram->call('copyMessage', [
                'chat_id' => $chatId,
                'from_chat_id' => $movie->channel_id,
                'message_id' => $movie->message_id,
                'caption' => $caption,
                'reply_markup' => json_encode($keyboard),
            ]);
            if ($response->successful()) $sent = true;
        }

        if (!$sent && $movie->file_id) {
            $response = $this->telegram->call('sendVideo', [
                'chat_id' => $chatId,
                'video' => $movie->file_id,
                'caption' => $caption,
                'reply_markup' => json_encode($keyboard),
            ]);
            if ($response->successful()) $sent = true;
        }

        if (!$sent) {
            $this->sendMessage($chatId, "⚠️ Video yuborishda xatolik yuz berdi.");
        }
    }

    private function sendMessage($chatId, $text)
    {
        $this->telegram->call('sendMessage', [
            'chat_id' => $chatId,
            'text' => $text,
        ]);
    }

    private function sendWelcomeMessage($chatId)
    {
        $keyboard = [
            'keyboard' => [
                [
                    ['text' => "🇺🇿 O'zbek tili"],
                    ['text' => "🇷🇺 Rus tili"],
                    ['text' => "🇺🇸 Ingliz tili"]
                ]
            ],
            'resize_keyboard' => true,
        ];

        $this->telegram->call('sendVideo', [
            'chat_id' => $chatId,
            'video' => 'BAACAgIAAyEFAATW7Y_gAAIB3Wm5BHuBV8buvAUl8x2RngN8-PghAAIvkwAC-NrJSTjAbjyHj0R2OgQ',
            'caption' => "Salom! Qo'llanma videoni ko'ring. Kino kodini va Kinoni nomini yuboring yoki quyidagi menyudan foydalaning.",
            'reply_markup' => json_encode($keyboard),
        ]);
    }

    private function handleCallbackQuery($callbackQuery)
    {
        $data = $callbackQuery['data'];
        $chatId = $callbackQuery['message']['chat']['id'];
        $messageId = $callbackQuery['message']['message_id'];

        if ($data === 'check_sub') {
            if ($this->checkSubscription($chatId)) {
                $this->sendWelcomeMessage($chatId);
                $this->telegram->call('deleteMessage', [
                    'chat_id' => $chatId,
                    'message_id' => $messageId
                ]);
            } else {
                $this->telegram->call('answerCallbackQuery', [
                    'callback_query_id' => $callbackQuery['id'],
                    'text' => "❌ Siz hali kanalga a'zo emassiz!",
                    'show_alert' => true
                ]);
            }
            return response()->json(['ok' => true]);
        }

        $this->telegram->call('answerCallbackQuery', [
            'callback_query_id' => $callbackQuery['id']
        ]);

        if (str_starts_with($data, 'lang_')) {
            $langCode = str_replace('lang_', '', $data);
            $this->editToSerialsByLanguage($chatId, $messageId, $langCode);
        } elseif (str_starts_with($data, 'serial_')) {
            $serialId = str_replace('serial_', '', $data);
            $this->sendEpisodesList($chatId, $messageId, $serialId);
        } elseif (str_starts_with($data, 'episode_')) {
            $episodeId = str_replace('episode_', '', $data);
            $this->sendEpisodeVideo($chatId, $episodeId);
        } elseif (str_starts_with($data, 'movie_')) {
            $movieCode = str_replace('movie_', '', $data);
            $movie = Movie::where('code', $movieCode)->first();
            if ($movie) {
                $this->sendMovieVideo($chatId, $movie);
            }
        }

        return response()->json(['ok' => true]);
    }

    /**
     * Til bo'yicha seriallar kam o'zgaradi - qisqa muddatga keshlanadi
     * (har xabarda DB so'rovi qilinmasligi uchun).
     */
    private function serialsByLanguage(string $langCode)
    {
        return Cache::remember("serials.{$langCode}", now()->addMinutes(10), function () use ($langCode) {
            return Serial::where('language', $langCode)->get();
        });
    }

    private function sendSerialsListByLangMessage($chatId, $langCode)
    {
        $serials = $this->serialsByLanguage($langCode);

        if ($serials->isEmpty()) {
            $this->sendMessage($chatId, "Bu tilda hozircha seriallar yo'q.");
            return;
        }

        $buttons = [];
        foreach ($serials as $serial) {
            $buttons[][] = [
                'text' => $serial->name,
                'callback_data' => 'serial_' . $serial->id
            ];
        }

        $this->telegram->call('sendMessage', [
            'chat_id' => $chatId,
            'text' => "Seriallardan birini tanlang:",
            'reply_markup' => json_encode(['inline_keyboard' => $buttons]),
        ]);
    }

    private function editToSerialsByLanguage($chatId, $messageId, $langCode)
    {
        $serials = $this->serialsByLanguage($langCode);

        if ($serials->isEmpty()) {
            $this->telegram->call('editMessageText', [
                'chat_id' => $chatId,
                'message_id' => $messageId,
                'text' => "Bu tilda hozircha seriallar yo'q."
            ]);
            return;
        }

        $buttons = [];
        foreach ($serials as $serial) {
            $buttons[][] = [
                'text' => $serial->name,
                'callback_data' => 'serial_' . $serial->id
            ];
        }

        $this->telegram->call('editMessageText', [
            'chat_id' => $chatId,
            'message_id' => $messageId,
            'text' => "Seriallardan birini tanlang:",
            'reply_markup' => json_encode(['inline_keyboard' => $buttons]),
        ]);
    }

    private function sendEpisodesList($chatId, $messageId, $serialId)
    {
        $serial = Serial::find($serialId);
        $episodes = SerialEpisode::where('serial_id', $serialId)->orderBy('episode_number')->get();

        if (!$serial || $episodes->isEmpty()) {
            $this->telegram->call('editMessageText', [
                'chat_id' => $chatId,
                'message_id' => $messageId,
                'text' => "Bu serialning qismlari hozircha yo'q.",
                'reply_markup' => json_encode([
                    'inline_keyboard' => [
                        [['text' => '🔙 Orqaga', 'callback_data' => 'lang_' . ($serial->language ?? 'uz')]]
                    ]
                ])
            ]);
            return;
        }

        $buttons = [];
        $row = [];
        foreach ($episodes as $episode) {
            $row[] = [
                'text' => $episode->episode_number . '-qism',
                'callback_data' => 'episode_' . $episode->id,
            ];

            if (count($row) == 3) {
                $buttons[] = $row;
                $row = [];
            }
        }
        if (!empty($row)) {
            $buttons[] = $row;
        }

        $lang = $serial->language ?? 'uz';
        $buttons[] = [
            [
                'text' => '🔙 Orqaga',
                'callback_data' => 'lang_' . $lang
            ]
        ];

        $this->telegram->call('editMessageText', [
            'chat_id' => $chatId,
            'message_id' => $messageId,
            'text' => "🎬 *{$serial->name}*\n\nQismlardan birini tanlang:",
            'parse_mode' => 'Markdown',
            'reply_markup' => json_encode(['inline_keyboard' => $buttons])
        ]);
    }

    private function sendEpisodeVideo($chatId, $episodeId)
    {
        $episode = SerialEpisode::with('serial')->find($episodeId);
        if (!$episode) {
            $this->sendMessage($chatId, "😕 Qism topilmadi.");
            return;
        }

        // Epizodga bog'langan Movie ma'lumotlarini topamiz
        $movieName = "{$episode->serial->name} {$episode->episode_number}-qism";
        $movie = Movie::where('name', $movieName)->first();

        if (!$movie) {
            $movie = Movie::where('file_id', $episode->file_id)->first();
        }

        if ($movie) {
            $movie->increment('views');
            $movie->refresh();
            $code = $movie->code;
            $views = $movie->views;
        } else {
            $code = "Mavjud emas";
            $views = 0;
        }

        $channelUsername = '@kin0meda';
        $caption = "🎬 <b>Serial:</b> {$episode->serial->name}\n" .
                   "🔢 <b>Qism:</b> {$episode->episode_number}\n" .
                   "🔍 <b>Kino kodi:</b> {$code}\n" .
                   "🎬 <b>Kanal:</b> {$channelUsername}\n" .
                   "👁 <b>Ko'rishlar:</b> {$views} ta\n\n" .
                   "🤖 <b>Bot:</b> @" . config('telegram.bot_username');

        $keyboard = [
            'inline_keyboard' => [
                [
                    [
                        'text' => '📤 Ulashish',
                        'switch_inline_query' => $code
                    ]
                ]
            ]
        ];

        $sent = false;

        if ($movie && $movie->message_id && $movie->channel_id) {
            $response = $this->telegram->call('copyMessage', [
                'chat_id' => $chatId,
                'from_chat_id' => $movie->channel_id,
                'message_id' => $movie->message_id,
                'caption' => $caption,
                'parse_mode' => 'HTML',
                'reply_markup' => json_encode($keyboard),
            ]);
            if ($response->successful()) $sent = true;
        }

        if (!$sent) {
            $this->telegram->call('sendVideo', [
                'chat_id' => $chatId,
                'video' => $episode->file_id,
                'caption' => $caption,
                'parse_mode' => 'HTML',
                'reply_markup' => json_encode($keyboard),
            ]);
        }
    }

    private function checkSubscription($chatId)
    {
        $channels = [
            ['id' => '-1003774629679', 'link' => 'https://t.me/kin0meda'],
        ];

        foreach ($channels as $channel) {
            $response = $this->telegram->call('getChatMember', [
                'chat_id' => $channel['id'],
                'user_id' => $chatId,
            ]);

            if ($response->successful()) {
                $status = $response->json('result.status');
                if ($status === 'left' || $status === 'kicked') {
                    return false;
                }
            }
        }

        return true;
    }

    private function sendSubscriptionMessage($chatId)
    {
        $buttons = [
            [
                ['text' => "Kanalga a'zo bo'lish", 'url' => 'https://t.me/kin0meda']
            ],
            [
                ['text' => "✅ Tasdiqlash", 'callback_data' => 'check_sub']
            ]
        ];

        $this->telegram->call('sendMessage', [
            'chat_id' => $chatId,
            'text' => "Botdan foydalanish uchun kanalimizga a'zo bo'ling:",
            'reply_markup' => json_encode(['inline_keyboard' => $buttons]),
        ]);
    }
}
