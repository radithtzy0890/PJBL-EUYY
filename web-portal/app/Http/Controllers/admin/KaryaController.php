<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Karya;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class KaryaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $karya = Karya::with('user')->latest()->get();
        return view('admin.pages.kelolakarya', compact('karya'));
    }

    public function karyaUser()
    {
        return view('pages.karya');
    } 

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.kelolakarya1');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'kategori' => 'required|string',
            'tahun' => 'required|integer|min:2000|max:' . (date('Y') + 1),
            'tim_pembuat' => 'required|string',
            'file_karya' => 'nullable|file|mimes:pdf,zip|max:10240',
            'preview_karya' => 'nullable|string',
        ]);

        $validated['user_id'] = Auth::id();
        $validated['tanggal_upload'] = now();
        $validated['status_validasi'] = 'menunggu';

        // Upload file jika ada
        if ($request->hasFile('file_karya')) {
            $validated['file_karya'] = $request->file('file_karya')->store('karya', 'public');
        }

        Karya::create($validated);

        return redirect()->route('admin.karya.index')->with('success', 'Karya berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $karya = Karya::with(['user', 'ratings', 'reviews.user'])->findOrFail($id);
        $averageRating = $karya->averageRating();
        $totalReviews = $karya->totalReviews();
        
        return view('admin.pages.lihatkarya', compact('karya', 'averageRating', 'totalReviews'));
    }
    
    public function userShow(string $id)
    {
        // $karya = Karya::with(['user', 'ratings', 'reviews.user'])->findOrFail($id);
        // $averageRating = $karya->averageRating();
        // $totalReviews = $karya->totalReviews();
        
        // return view('pages.detailkarya', compact('karya', 'averageRating', 'totalReviews'));
        return view('pages.detailkarya');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $karya = Karya::findOrFail($id);
        return view('admin.pages.kelolakarya3', compact('karya'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $karya = Karya::findOrFail($id);

        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'kategori' => 'required|string',
            'tahun' => 'required|integer|min:2000|max:' . (date('Y') + 1),
            'tim_pembuat' => 'required|string',
            'file_karya' => 'nullable|file|mimes:pdf,zip|max:10240',
            'preview_karya' => 'nullable|string',
        ]);

        // Upload file baru jika ada
        if ($request->hasFile('file_karya')) {
            // Hapus file lama
            if ($karya->file_karya) {
                Storage::disk('public')->delete($karya->file_karya);
            }
            $validated['file_karya'] = $request->file('file_karya')->store('karya', 'public');
        }

        $karya->update($validated);

        return redirect()->route('admin.karya.index')->with('success', 'Karya berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $karya = Karya::findOrFail($id);

        // Hapus file
        if ($karya->file_karya) {
            Storage::disk('public')->delete($karya->file_karya);
        }

        $karya->delete();

        return redirect()->route('admin.karya.index')->with('success', 'Karya berhasil dihapus!');
    }

    /**
     * Update status validasi karya
     */
    public function updateStatus(Request $request, string $id)
    {
        $karya = Karya::findOrFail($id);
        
        $validated = $request->validate([
            'status_validasi' => 'required|in:menunggu,disetujui,ditolak'
        ]);

        $karya->update($validated);

        return redirect()->back()->with('success', 'Status validasi berhasil diupdate!');
    }

    /**
     * Halaman validasi konten
     */
    public function validationPage()
    {
        $karya = Karya::with('user')
            ->where('status_validasi', 'menunggu')
            ->latest()
            ->get();
        
        return view('admin.pages.validasikonten', compact('karya'));
    }
}