<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KelolaKaryaController extends Controller
{
    public function index()
    {
        // nanti ini halaman kumpulan karya
        return view('pages.karya');
    }

    public function unggah()
    {
        // nanti ini halaman unggah karya
        return view('pages.unggah');
    }
}
