<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMataKuliahsTable extends Migration
{
    public function up()
    {
        Schema::create('mata_kuliahs', function (Blueprint $table) {
            // $table->string('id_matkul', 10)->primary();
            // $table->string('id_prodi', 10);
            $table->id();
            $table->string('kode_matkul', 20);
            $table->string('nama_matkul', 100);
            $table->integer('sks_teori')->default(0);
            $table->integer('sks_praktik')->default(0);
            $table->integer('semester');
            $table->timestamps();
            
            // $table->foreign('id_prodi')->references('id_prodi')->on('profil_prodis')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('mata_kuliahs');
    }
}