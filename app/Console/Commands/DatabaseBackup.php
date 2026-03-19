<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\File;

class DatabaseBackup extends Command
{
    /**
     * Buyruq nomi: php artisan db:backup-to-telegram
     */
    protected $signature = 'db:backup-to-telegram';

    /**
     * Ta'rifi
     */
    protected $description = 'MySQL ma\'lumotlarini (kino va userlar) Telegram kanaliga backup qilish';

    /**
     * User tomonidan berilgan ma'lumotlar
     */
    private $botToken = '8294043633:AAHz_qR8g7Ncj9VZqdI9jpT-fKB0CvSzNZo';
    private $chatId = '-1003613537150';

    /**
     * Asosiy mantiq
     */
    public function handle()
    {
        $this->info("Backup jarayoni boshlandi...");

        // DB ma'lumotlarini Laravel configidan olamiz
        $connection = config('database.default');
        $dbConfig = config("database.connections.{$connection}");

        $dbName = $dbConfig['database'];
        $dbUser = $dbConfig['username'];
        $dbPass = $dbConfig['password'];
        $dbHost = $dbConfig['host'];

        $date = now()->format('Y-m-d_H-i-s');

        // Fayl nomlari
        $kinoFileName = "kino_kodlari_backup_{$date}.sql";
        $userFileName = "userlar_backup_{$date}.sql";

        // Saqlash joyi (storage/app/backups)
        $backupDir = storage_path('app/backups');
        if (!File::exists($backupDir)) {
            File::makeDirectory($backupDir, 0755, true);
        }

        $kinoFilePath = "{$backupDir}/{$kinoFileName}";
        $userFilePath = "{$backupDir}/{$userFileName}";

        try {
            // 1. Kino kodlari backup (movies, serials, serial_episodes jadvallari)
            $this->dumpTables(['movies', 'serials', 'serial_episodes'], $kinoFilePath, $dbUser, $dbPass, $dbName, $dbHost);
            $this->info("🎬 Kino kodlari dump qilindi.");

            // 2. Userlar backup (users va telegram_users jadvallari)
            $this->dumpTables(['users', 'telegram_users'], $userFilePath, $dbUser, $dbPass, $dbName, $dbHost);
            $this->info("👤 Userlar dump qilindi.");

            // 3. User statistikasi
            $weeklyUsers = \App\Models\TelegramUser::where('updated_at', '>=', now()->subDays(7))->count();
            $totalUsers = \App\Models\TelegramUser::count();

            $statsText = "\n\n📊 <b>Statistika:</b>\n" .
                         "👤 Bir haftalik faol foydalanuvchilar: <b>{$weeklyUsers}</b> ta\n" .
                         "👥 Umumiy foydalanuvchilar: <b>{$totalUsers}</b> ta";

            // 4. Telegramga yuborish
            $this->sendToTelegram($kinoFilePath, "🎬 <b>Kino Kodlari Backup</b>\n📅 Sana: " . now()->toDateTimeString() . $statsText);
            $this->sendToTelegram($userFilePath, "👤 <b>Userlar Backup</b>\n📅 Sana: " . now()->toDateTimeString() . $statsText);

            $this->info("✅ Backup muvaffaqiyatli Telegramga yuborildi!");

        } catch (\Exception $e) {
            $this->error("❌ Xatolik yuz berdi: " . $e->getMessage());
            // Xatolikni Telegramga ham yuborish mumkin (ixtiyoriy)
        } finally {
            // Vaqtinchalik .sql fayllarni serverdan o'chiramiz
            if (File::exists($kinoFilePath)) File::delete($kinoFilePath);
            if (File::exists($userFilePath)) File::delete($userFilePath);
        }
    }

    /**
     * mysqldump buyrug'i orqali jadvallarni export qilish
     */
    private function dumpTables(array $tables, string $filePath, $user, $pass, $db, $host)
    {
        $tablesStr = implode(' ', $tables);
        
        // Parol bo'lsa uni ham qo'shib yozish kerak
        $passwordFlag = $pass ? "-p\"{$pass}\"" : "";
        $command = "mysqldump -u\"{$user}\" {$passwordFlag} -h\"{$host}\" {$db} {$tablesStr} > {$filePath}";
        
        // Buyruqni bajarish
        exec($command, $output, $resultCode);

        if ($resultCode !== 0) {
            throw new \Exception("mysqldump xatolik (kod: {$resultCode}). Serverda mysqldump o'rnatilganligini tekshiring.");
        }
    }

    /**
     * Telegram bot API orqali faylni yuborish
     */
    private function sendToTelegram(string $filePath, string $caption)
    {
        $url = "https://api.telegram.org/bot{$this->botToken}/sendDocument";

        // Laravel Http facade orqali multipart/form-data yuborish
        $response = Http::attach(
            'document', 
            fopen($filePath, 'r'), 
            basename($filePath)
        )->post($url, [
            'chat_id' => $this->chatId,
            'caption' => $caption,
            'parse_mode' => 'HTML'
        ]);

        if (!$response->successful()) {
            throw new \Exception("Telegram xatoligi: " . ($response->json()['description'] ?? $response->body()));
        }
    }
}
