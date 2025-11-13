<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilProdisTable extends Migration
{
    public function up()
    {
        Schema::create('profil_prodis', function (Blueprint $table) {
            $table->string('kode_prodi', 10)->primary();
            $table->string('nama_prodi', 100);
            $table->text('visi')->nullable();
            $table->text('misi')->nullable();
            $table->text('deskripsi')->nullable();
            $table->text('capaian')->nullable();
            $table->text('tujuan')->nullable();
            $table->string('kontak', 50)->nullable();
            $table->string('alamat', 200)->nullable();
            $table->string('gambar_header', 200)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('profil_prodis');
    }
}
