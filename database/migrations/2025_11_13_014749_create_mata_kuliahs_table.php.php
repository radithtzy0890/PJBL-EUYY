<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMataKuliahsTable extends Migration
{
    public function up()
{
    Schema::create('mata_kuliahs', function (Blueprint $table) {
        $table->id();
        $table->string('kode_matkul', 20);
        $table->string('nama_matkul');
        $table->string('sks_teori', 10);
        $table->string('sks_praktik', 10);
        $table->integer('semester');
        $table->timestamps();
    });
}

    public function down()
    {
        Schema::dropIfExists('mata_kuliahs');
    }
}