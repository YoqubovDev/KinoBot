# KinoBot

KinoBot is a Laravel-based project that integrates with Telegram to manage and post movies from a channel. The project includes a small admin API for adding/updating movies, a `Movie` model and seeder that imports Telegram file IDs, and a `TelegramService` wrapper for Telegram Bot API interactions.

**Main features:**
- Handle Telegram webhooks and bot messages
- Admin API for CRUD operations on movies (`App\\Http\\Controllers\\AdminController`)
- `TelegramService` for sending messages, photos, videos, buttons, files, and managing webhooks
- Database seeders to import existing Telegram media (`database/seeders/MovieSeeder1.php`)

## Requirements
- PHP 8.2+
- Composer
- Node.js & npm (for Vite / frontend)
- MySQL / SQLite / other supported database

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

5. Install frontend dependencies and build (optional for production):

```bash
npm install
npm run build       # or `npm run dev` for development
```

6. Serve the app locally:

```bash
php artisan serve
```

## Telegram integration
- Webhook endpoint: `POST /telegram/webhook` (defined in `routes/web.php`)
- API webhook (alternative): `POST /api/webhook` (defined in `routes/api.php`)
- You can set webhook via the route `GET /telegram/set-webhook` or programmatically using `TelegramService::setWebhook($url)`.

`TelegramService` supports methods like `sendMessage`, `sendPhoto`, `sendVideo`, `forwardMessage`, `sendMessageWithButtons`, `answerCallbackQuery`, `sendDocument`, `getMe`, `getChat`, `editMessageText`, `deleteMessage`, `setWebhook`, and `getWebhookInfo`.

Make sure `TELEGRAM_BOT_TOKEN` is set in `.env` before calling webhook or sending messages.

## API (Admin)
Key admin endpoints are implemented in `App\\Http\\Controllers\\AdminController`:

- `POST /api/admin/movie/add` — add a movie
- `PUT /api/admin/movie/{id}` — update a movie
- `DELETE /api/admin/movie/{id}` — delete a movie
- `GET /api/admin/movies` — list movies (paginated)
- `GET /api/admin/movie/{id}` — get one movie
- `GET /api/admin/stats` — basic stats (total movies, views, most viewed)

Note: Protect admin routes with authentication/middleware before using in production.

## Database & Seeders
- The `Movie` model (`app/Models/Movie.php`) stores `code`, `channel_id`, `message_id`, `file_id`, and `views`.
- `database/seeders/MovieSeeder1.php` inserts a list of Telegram `file_id`s and `message_id`s — useful to bootstrap existing channel content.

## Running tests
Use the included composer scripts:

```bash
composer test
```

This runs `php artisan test` (see `composer.json` scripts).

## Development scripts
- `composer run setup` — installs PHP and JS deps, generates key, runs migrations and builds assets (defined in `composer.json`)
- `npm run dev` — starts Vite in dev mode

## Notes & recommendations
- Do not commit real tokens or secrets. Keep `.env` out of version control.
- Configure queue/worker (if used) and long-running processes for production.
- Add authentication + role checks for admin API endpoints.

## License
This project uses the MIT license (inherited from Laravel skeleton).

---
Generated README: see [README.md](README.md) for this file.
