<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('karyas', function (Blueprint $table) {
            $table->string('link_pengumpulan')->nullable()->after('file_karya');
        });
    }

    public function down(): void
    {
        Schema::table('karyas', function (Blueprint $table) {
            $table->dropColumn('link_pengumpulan');
        });
    }
};