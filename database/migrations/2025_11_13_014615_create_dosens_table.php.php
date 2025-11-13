<?php

use App\Models\ProfilProdi;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDosensTable extends Migration
{
    public function up()
    {
        Schema::create('dosens', function (Blueprint $table) {
            $table->id();
            // $table->foreignIdFor(ProfilProdi::class)->constrained()->onDelete('cascade');
            $table->string('nama_dosen', 100);
            $table->string('email', 50)->nullable();
            $table->string('bidang_keahlian', 100)->nullable();
            $table->string('foto', 200)->nullable();
            $table->enum('status', ['aktif', 'tidak_aktif'])->default('aktif');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('dosens');
    }
}
