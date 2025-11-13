<?php

use App\Models\Karya;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRatingsTable extends Migration
{
    public function up()
    {
        Schema::create('ratings', function (Blueprint $table) {
            $table->id(); // biar auto increment dan lebih rapi
            $table->foreignIdFor(Karya::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(User::class)->constrained()->onDelete('cascade');
            $table->integer('nilai'); // nilai rating 1-5
            $table->date('tanggal_rating');
            $table->timestamps();

            // $table->unique(['karya_id', 'user_id']); // 1 user cuma boleh 1 rating per karya
        });
    }

    public function down()
    {
        Schema::dropIfExists('ratings');
    }
}
