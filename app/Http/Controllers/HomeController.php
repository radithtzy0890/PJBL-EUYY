<?php

namespace App\Http\Controllers;

use App\Models\Karya;
use App\Models\Berita;
use App\Models\ProfilProdi;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // Homepage
    public function index(Request $request)
    {
        // Get approved karya with search and filter
        $query = Karya::with(['user', 'ratings'])
            ->where('status_validasi', 'disetujui');

        // Search
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('judul_karya', 'like', "%{$search}%")
                  ->orWhere('tim_pembuat', 'like', "%{$search}%");
            });
        }

        // Filter by category
        if ($request->has('kategori') && $request->kategori != '') {
            $query->where('kategori', $request->kategori);
        }

        // Filter by year
        if ($request->has('tahun') && $request->tahun != '') {
            $query->where('tahun', $request->tahun);
        }

        $karyas = $query->orderBy('created_at', 'desc')->paginate(6);

        // Get recent news
        $beritas = Berita::orderBy('tanggal_publikasi', 'desc')->take(3)->get();

        // Get categories for filter
        $categories = Karya::where('status_validasi', 'disetujui')
            ->distinct()
            ->pluck('kategori');

        return view('frontend.home', compact('karyas', 'beritas', 'categories'));
    }

    // Tentang page
    public function tentang()
    {
        $profil = ProfilProdi::first();

        return view('frontend.tentang', compact('profil'));
    }

    // Dosen page
    public function dosen()
    {
        $dosens = \App\Models\Dosen::where('status', 'aktif')
            ->orderBy('nama_dosen', 'asc')
            ->get();

        return view('frontend.dosen', compact('dosens'));
    }

    // Mata Kuliah page
    public function matakuliah()
    {
        $mataKuliahs = \App\Models\MatKuliah::orderBy('semester', 'asc')
            ->orderBy('kode_matkul', 'asc')
            ->get()
            ->groupBy('semester');

        return view('frontend.matakuliah', compact('mataKuliahs'));
    }

    // FAQ page
    //public function faq()
    {
        //$faqs = \App\Models\Faq::orderBy('urutan', 'asc')->get();

        //return view('frontend.faq', compact('faqs'));
    }

    // Detail Karya page
    public function detailKarya($id)
    {
        $karya = Karya::with(['user', 'reviews' => function($query) {
            $query->where('status_moderasi', 'approved')->orderBy('created_at', 'desc');
        }, 'reviews.user', 'ratings'])
            ->where('status_validasi', 'disetujui')
            ->findOrFail($id);

        $averageRating = $karya->averageRating();
        $totalReviews = $karya->totalReviews();

        // Check if current user already rated
        $userRating = null;
        if (auth()->check()) {
            $userRating = $karya->ratings()
                ->where('id_user', auth()->user()->id_user)
                ->first();
        }

        return view('frontend.detail-karya', compact('karya', 'averageRating', 'totalReviews', 'userRating'));
    }

    // Kontak page
    public function kontak()
    {
        return view('frontend.kontak');
    }
}