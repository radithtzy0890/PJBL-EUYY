<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProfilProdi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfilProdiController extends Controller
{
    public function index()
    {
        $profil = ProfilProdi::first();
        return view('admin.pages.info-prodi.index', compact('profil'));
    }

    public function edit(string $type)
    {
        $profil = ProfilProdi::first();
        return view('admin.pages.info-prodi.edit', compact('profil', 'type'));
    }

    public function update(Request $request, $kodeProdi)
    {
        $validated = $request->validate([
            'visi'      => 'nullable|string',
            'misi'      => 'nullable|string',
            'capaian'   => 'nullable|string',
            'video'     => 'nullable|file',
        ]);

        // Ambil profil berdasarkan kode_prodi
        $profil = ProfilProdi::where('kode_prodi', $kodeProdi)->firstOrFail();

        // Handle upload video
        if ($request->hasFile('video')) {

            // Hapus video lama jika ada
            if ($profil->video && file_exists(public_path('uploads/video/' . $profil->video))) {
                unlink(public_path('uploads/video/' . $profil->video));
            }

            // Simpan video baru
            $videoName = time() . '_' . $request->video->getClientOriginalName();
            $request->video->move(public_path('uploads/video'), $videoName);

            $validated['gambar_header'] = $videoName;
        }

        // Update profil
        $profil->update($validated);

        return redirect()->route('info-prodi.index')
                        ->with('success', 'Profil prodi berhasil diperbarui!');
    }

}