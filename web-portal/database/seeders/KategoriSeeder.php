<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('kategoris')->insert([
            [ "name" => "Aplikasi Mobile" ],
            [ "name" => "Aplikasi Web" ],
            [ "name" => "Game" ],
            [ "name" => "UI/UX Design" ],
            [ "name" => "Machine Learning" ],
            [ "name" => "Internet of Things (IoT)" ],
            [ "name" => "Desain Grafis" ],
            [ "name" => "Video / Multimedia" ],
            [ "name" => "Penelitian" ],
            [ "name" => "Produk Inovasi" ],
        ]);
    }
}
