<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Karya;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class KaryaController extends Controller
{
    // ============================================
    // UNTUK USER BIASA (Frontend)
    // ============================================
    
    // Tampilkan semua karya yang ACCEPTED dengan search & filter
    // public function karyaUser(Request $request)
    // {
    //     $query = Karya::where('status_validasi', 'accepted')
    //                   ->with('reviews');
        
    //     // Filter berdasarkan search
    //     if ($request->has('search') && $request->search != '') {
    //         $search = $request->search;
    //         $query->where(function($q) use ($search) {
    //             $q->where('judul', 'like', '%' . $search . '%')
    //               ->orWhere('tim_pembuat', 'like', '%' . $search . '%')
    //               ->orWhere('kategori', 'like', '%' . $search . '%')
    //               ->orWhere('deskripsi', 'like', '%' . $search . '%');
    //         });
    //     }
        
    //     // Filter berdasarkan kategori
    //     if ($request->has('kategori') && $request->kategori != '') {
    //         $query->where('kategori', $request->kategori);
    //     }
        
    //     $karyas = $query->orderBy('created_at', 'desc')->get();
        
    //     return view('pages.karya', compact('karyas'));
    // }

    // Detail karya
    // public function userShow(string $id)
    // {
    //     $karya = Karya::with('reviews.user')->findOrFail($id);
        
    //     // Cek apakah karya sudah ACCEPTED
    //     if ($karya->status_validasi !== 'accepted') {
    //         return redirect()->route('home')
    //                        ->with('error', 'Karya ini belum disetujui atau tidak tersedia.');
    //     }
        
    //     return view('pages.detailkarya', compact('karya'));
    // }

    // ============================================
    // UNTUK ADMIN (Backend)
    // ============================================
    
    // Admin - lihat semua karya
    public function index()
    {
        $accepted = Karya::with('user')
        ->where('status_validasi', 'accepted')
        ->get();

        $rejected = Karya::with('user')
            ->where('status_validasi', 'rejected')
            ->get();

        return view('admin.pages.karya.index', compact('accepted', 'rejected'));
    }

    public function store(Request $request)
    {
        // 1. Validasi input
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'kategori' => 'required|string',
            'deskripsi' => 'required|string',
            'tim_pembuat' => 'required|string|max:255',
            'email' => ['required', 'email', 'regex:/^[a-zA-Z0-9._%+-]+@apps\.ipb\.ac\.id$/'],
            'preview_karya' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'tahun' => 'required|integer|min:2000|max:' . (date('Y') + 1),
            'link' => 'required|url',
        ], [
            'judul.required' => 'Judul karya wajib diisi',
            'kategori.required' => 'Kategori wajib dipilih',
            'tim_pembuat.required' => 'Nama tim/pembuat wajib diisi',
            'tahun.required' => 'Tahun wajib dipilih',
            'email.required' => 'Email wajib diisi',
            'deskripsi.required' => 'Deskripsi wajib diisi',
            '/preview_karya.required' => 'Gambar wajib diupload',
            'preview_karya.image' => 'File harus berupa gambar',
            'preview_karya.mimes' => 'Format gambar harus JPG, PNG, atau JPEG',
            'preview_karya.max' => 'Ukuran gambar maksimal 2MB',
            'email.regex' => 'Email wajib menggunakan domain @apps.ipb.ac.id'
        ]);

        // 2. Upload gambar
        $gambarPath = null;
        if ($request->hasFile('preview_karya')) {
            $gambarPath = $request->file('preview_karya')->store('karya', 'public');
        }

        // 3. Simpan ke database
        Karya::create([
            'user_id' => Auth::id(),
            'judul' => $validated['judul'],
            'deskripsi' => $validated['deskripsi'],
            'kategori' => $validated['kategori'],
            'tahun' => $validated['tahun'],
            'preview_karya' => $gambarPath,
            'tim_pembuat' => $validated['tim_pembuat'],
            'link_pengumpulan' => $validated['link'],
            'status_validasi' => 'submission',
            'tanggal_upload' => now(),
        ]);

        // 4. Redirect dengan pesan sukses
        return redirect()->route('karya.validasi')
                         ->with('success', 'Karya berhasil diunggah! Menunggu validasi admin.');
    }

    // Admin - form tambah karya
    public function create()
    {
        return view('admin.pages.karya.create');
    }

    // Admin - lihat detail karya
    public function show(string $id)
    {
        $karya = Karya::with(['user', 'reviews.user'])->findOrFail($id);
        return view('admin.pages.karya.show', compact('karya'));
    }
    
    public function validationForm($id)
    {
        $karya = Karya::with(['user'])->findOrFail($id);
        return view('admin.pages.karya.validation.show', compact('karya'));
    }

    // Admin - update karya
    public function update(Request $request, string $id)
    {
        $karya = Karya::findOrFail($id);

        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'tahun' => 'required|integer|min:2000|max:' . (date('Y') + 1),
            'tim_pembuat' => 'required|string',
            'preview_karya' => 'nullable|string',
            'status_validasi' => 'required',
        ]);

        $karya->update($validated);

        return redirect()->route('karya.index')->with('success', 'Karya berhasil diupdate!');
    }

    // Admin - hapus karya
    public function destroy(string $id)
    {
        $karya = Karya::findOrFail($id);

        if ($karya->file_karya) {
            Storage::disk('public')->delete($karya->file_karya);
        }
        if ($karya->preview_karya) {
            Storage::disk('public')->delete($karya->preview_karya);
        }

        $karya->delete();

        return redirect()->route('karya.index')->with('success', 'Karya berhasil dihapus!');
    }

    // Admin - approve karya
    public function approve($id)
    {
        $karya = Karya::findOrFail($id);
        $karya->update(['status_validasi' => 'accepted']);

        return redirect()->route('kelolakarya')
                         ->with('success', 'Karya berhasil disetujui!');
    }

    // Admin - reject karya
    public function reject($id)
    {
        $karya = Karya::findOrFail($id);
        $karya->update(['status_validasi' => 'rejected']);

        return redirect()->route('kelolakarya')
                         ->with('success', 'Karya berhasil ditolak!');
    }

    // Admin - halaman validasi konten
    public function validation()
    {
        $karyas = Karya::with('user')
            ->where('status_validasi', 'submission')
            ->latest()
            ->get();
        
        return view('admin.pages.karya.validation.index', compact('karyas'));
    }

    // dan dibawah ini tambahan terbaru ya 
    // Admin - store karya baru (dari dashboard)
    public function storeAdmin(Request $request)
    {
    $validated = $request->validate([
        'judul' => 'required|string|max:255',
        'kategori' => 'required|string',
        'deskripsi' => 'required|string',
        'tim_pembuat' => 'required|string|max:255',
        'tahun' => 'required|integer|min:2000|max:' . (date('Y') + 1),
        'link_pengumpulan' => 'nullable|url',
        'preview_karya' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    // Upload gambar jika ada
    $gambarPath = null;
    if ($request->hasFile('preview_karya')) {
        $gambarPath = $request->file('preview_karya')->store('karya', 'public');
    }

    // Simpan ke database dengan status submission
    Karya::create([
        'user_id' => Auth::id(),
        'judul' => $validated['judul'],
        'kategori' => $validated['kategori'],
        'deskripsi' => $validated['deskripsi'],
        'tim_pembuat' => $validated['tim_pembuat'],
        'tahun' => $validated['tahun'],
        'link_pengumpulan' => $validated['link_pengumpulan'] ?? null,
        'preview_karya' => $gambarPath,
        'status_validasi' => 'submission',
        'tanggal_upload' => now(),
    ]);

    return redirect()->route('validasikonten')
                     ->with('success', 'Karya berhasil ditambahkan! Silakan validasi.');
}
}