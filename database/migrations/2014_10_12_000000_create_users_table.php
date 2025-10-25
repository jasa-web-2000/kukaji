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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username')->unique();
            $table->string('fullname');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('phone')
                ->nullable();
            $table->string('bio')
                ->nullable();
            $table->string('address')
                ->nullable();
            $table->enum('gender', ["male", "female"])
                ->nullable();
            $table->enum('role', ["admin", "eo", "user"])
                ->default('user');
            $table->timestamp('birthdate')->nullable();
            $table->enum('status', ["pending", "reject", "accept"])
                ->default('pending');
            $table->string('photo')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
