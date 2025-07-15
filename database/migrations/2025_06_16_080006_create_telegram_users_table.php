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
        Schema::create('telegram_users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('username')->nullable();
            $table->bigInteger('chat_id')->unique();
            $table->enum('role', ['department_manager', 'director', 'hr_manager']);
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('telegram_users');
    }
};
