<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Tabel Activity Logs
        Schema::create('activity_logs', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('action');
            $table->string('judul_karya');
            $table->text('deskripsi')->nullable();
            $table->string('pembuat')->nullable();
            $table->string('validasi')->nullable();
            $table->string('status')->default('pending');
            $table->string('link')->nullable();
            $table->timestamps();
        });

        // Tabel Visitors
        Schema::create('visitors', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('email');
            $table->string('ip_address');
            $table->string('user_agent')->nullable();
            $table->string('page_visited')->nullable();
            $table->timestamp('visited_at');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('activity_logs');
        Schema::dropIfExists('visitors');
    }
};