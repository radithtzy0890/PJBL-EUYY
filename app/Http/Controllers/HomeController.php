<?php

namespace App\Http\Controllers;

use App\Models\Karya;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Ambil 6 karya terbaru yang ACCEPTED dengan relasi reviews
        $karyas = Karya::where('status_validasi', 'accepted') // ✅ GANTI
                      ->with('reviews')
                      ->orderBy('created_at', 'desc')
                      ->limit(6)
                      ->get();
        
        return view('pages.homepages', compact('karyas'));
    }
}