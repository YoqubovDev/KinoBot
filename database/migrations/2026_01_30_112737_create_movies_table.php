<?php
// app/database/migrations/2024_01_01_create_movies_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique(); // Kino kodi: 125
            $table->string('channel_id')->nullable(); // @kino_channel
            $table->bigInteger('message_id')->nullable(); // Telegram post ID
            $table->string('file_id')->nullable(); // Telegram file_id (video uchun)
            $table->integer('views')->default(0); // Ko'rilishlar soni
            $table->timestamps();
            
            // Indexlar tezligi uchun
            $table->index('code');
            $table->index('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};