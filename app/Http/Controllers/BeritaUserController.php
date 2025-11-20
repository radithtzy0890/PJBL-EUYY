<?php

namespace App\Http\Controllers;

use App\Models\Berita;

class BeritaUserController extends Controller
{
    public function index()
{
    $berita = Berita::latest()->get();
    return view('pages.berita', compact('berita'));
}

public function show($id)
{
    $berita = Berita::findOrFail($id);
    return view('pages.berita', compact('berita'));
}

}
