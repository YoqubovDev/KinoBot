# KinoBot

KinoBot is a Laravel-based Telegram bot that serves movies/serials from a channel by code or name search, using `copyMessage`/`sendVideo` with stored Telegram `file_id`s (no video files are stored on disk).

**Main features:**
- Handle Telegram webhooks and bot messages (`App\Http\Controllers\TelegramController`)
- Channel subscription check before serving content
- Movie and serial/episode lookup by code or name

## Requirements
- PHP 8.2+
- Composer
- MySQL / SQLite / other supported database
- Node.js & npm are NOT required in production — the bot has no frontend to build

## Quick setup
1. Clone the repo and install PHP dependencies:

```bash
composer install
```

2. Copy `.env` and generate app key:

```bash
cp .env.example .env
php artisan key:generate
```

3. Configure `.env` (important values):

- `TELEGRAM_BOT_TOKEN` — bot token from BotFather
- `TELEGRAM_CHANNEL_USERNAME` — default channel username (e.g. `@KinolarOlami`)
- Database settings (`DB_CONNECTION`, `DB_HOST`, `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`)

4. Run migrations and seeders:

```bash
php artisan migrate
php artisan db:seed --class=MovieSeeder1
```

5. Serve the app locally:

```bash
php artisan serve
```

## Telegram integration
- Active webhook endpoint: `POST /api/webhook` (defined in `routes/api.php`, handled by `TelegramController@handle`) — this is the URL registered with Telegram via `setWebhook`.
- `GET /telegram/set-webhook` — registers `{APP_URL}/api/webhook` as the bot's webhook with Telegram.
- `GET /telegram/remove-webhook` — removes the webhook (useful for local `ngrok` testing, or to pause the bot).

Make sure `TELEGRAM_BOT_TOKEN`, `TELEGRAM_BOT_USERNAME`, and `TELEGRAM_CHANNEL_USERNAME` are set in `.env` (see `config/telegram.php`).

## Database & Seeders
- The `Movie` model (`app/Models/Movie.php`) stores `code`, `channel_id`, `message_id`, `file_id`, and `views`.
- New content is added by writing a new `database/seeders/MovieSeederN.php` (or `*Seeder.php` for serials) and registering it in `DatabaseSeeder::run()`, then running `php artisan db:seed --force` on the server.
- Every seeder uses `Movie::firstOrCreate(['code' => ...], [...])` / `SerialEpisode::firstOrCreate(...)` — it only inserts rows that don't exist yet and never touches existing ones. This matters because `db:seed` re-runs **all** registered seeders every time (not just the new one you added), so seeders must be safe to run repeatedly:
  - Older seeders used a raw `DB::table('movies')->insert(...)`, which threw a duplicate-key error on any re-run (since `movies.code` is unique) — that would have crashed the whole `db:seed` command, including the new seeder you actually wanted to run.
  - Some seeders used `updateOrCreate(...)` with `'views' => rand(100, 500)`, which silently reset real view counts back to a random number on every re-run. Switching to `firstOrCreate` fixes both issues.
- `ZolotayaLojhkaSeeder` exists but isn't registered in `DatabaseSeeder::run()` — add it there if that content should actually be seeded.

## Architecture notes (for adding new features)
- `App\Services\TelegramApi` wraps every Telegram Bot API call (token, base URL, 10s timeout in one place). Add new Telegram methods by calling `$this->telegram->call('methodName', [...])` — no need to repeat the URL/token boilerplate.
- `TelegramController` stays a thin request handler; put new business logic (new content types, new commands) in a dedicated `App\Services\*` class the same way, rather than growing the controller further.
- Serial-by-language lookups are cached for 10 minutes (`Cache::remember`, see `serialsByLanguage()`) since that list rarely changes — cuts DB queries on every `/start` and language button tap. Bust it manually (`php artisan cache:clear` or wait 10 min) after editing serials directly in the DB.
- `POST /api/webhook` is rate-limited to 1 request/second per chat (`RateLimiter::for('telegram', ...)` in `AppServiceProvider`) so one spammy user can't monopolize the limited CPU; Telegram automatically retries updates that get a non-2xx response.
- If a lightweight admin UI is needed later, avoid Filament/Livewire (heavy on 256MB RAM) — a plain Blade + controller CRUD (like the removed `Admin\MovieController`, rewritten to use `TelegramApi`/models directly) is enough for occasional content management.

## Running tests
Use the included composer scripts:

```bash
composer test
```

This runs `php artisan test` (see `composer.json` scripts).

## Deploying to a resource-limited host (e.g. alwaysdata free tier)
This bot is designed to run comfortably on ~256MB RAM / 1/4 CPU / 1GB disk:
- It's webhook-based (no polling loop) and never stores video files on disk — videos are served via Telegram `file_id` / `copyMessage`.
- No queue worker is needed — nothing dispatches jobs, so don't run `queue:work` continuously (it would just sit idle consuming memory).
- After every `git pull` on the server, run:

```bash
composer install --no-dev --optimize-autoloader
php artisan migrate --force
php artisan config:cache
php artisan route:cache
```

- `LOG_CHANNEL=daily` with `LOG_DAILY_DAYS=3` (see `.env.example`) auto-deletes old log files so logs can't fill the 1GB disk.
- Set `APP_ENV=production` and `APP_DEBUG=false` in the server's `.env` — never leave debug mode on in production (leaks secrets in error pages, and is slower).

## Notes & recommendations
- Do not commit real tokens or secrets. Keep `.env` out of version control.
- `.env` is not tracked by git — update it directly on the server after deploying.

## License
This project uses the MIT license (inherited from Laravel skeleton).

---
Generated README: see [README.md](README.md) for this file.
