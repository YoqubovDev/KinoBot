<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('serial_episodes', function ($table) {
        $table->id();

        $table->foreignId('serial_id')
              ->constrained()
              ->cascadeOnDelete();

        $table->integer('episode_number');
        $table->string('file_id');
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('serial_episodes');
    }
};
