<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('karyas', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->constrained()->onDelete('cascade');
            $table->string('judul');
            $table->text('deskripsi');
            $table->string('kategori');
            $table->integer('tahun');
            $table->string('file_karya')->nullable();
            $table->string('preview_karya')->nullable();
            $table->string('tim_pembuat');
            $table->enum('status_validasi', ['submission', 'accepted', 'rejected'])->default('submission');
            $table->timestamp('tanggal_upload')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('karyas');
    }
};