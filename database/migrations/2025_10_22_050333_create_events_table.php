<?php

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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->string('thumbnail');
            $table->string('name');
            $table->string('slug')->unique();
            $table->enum('status', ["pending", "reject", "accept"])
                ->default('pending');
            $table->string('address');
            $table->timestamp('date')->nullable();

            $table->foreignId('theme_id')
                ->default(1)
                ->references('id')
                ->on('themes');


            $table->foreignId('speaker_id')
                ->default(1)
                ->references('id')
                ->on('speakers');

            $table->text('description')->nullable();
            $table->dateTime('timestamp');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
