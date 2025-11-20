<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Karya;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Ambil 6 karya terbaru yang ACCEPTED dengan relasi reviews
        $karyas = Karya::where('status_validasi', 'accepted')
                      ->with('reviews')
                      ->orderBy('created_at', 'desc')
                      ->limit(3)
                      ->get();
        
        $beritas = Berita::all();
        
        return view('pages.homepages', compact('karyas','beritas'));
    }
}