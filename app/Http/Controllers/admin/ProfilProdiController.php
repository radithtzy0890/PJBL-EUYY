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
        
        if (!$profil) {
            $profil = ProfilProdi::create([
                'nama_prodi' => 'Teknologi Rekayasa Perangkat Lunak',
            ]);
        }

        return view('admin.pages.infoprodi', compact('profil'));
    }

    public function edit()
    {
        $profil = ProfilProdi::first();
        return view('admin.pages.infoprodivisimisi', compact('profil'));
    }

    public function update(Request $request)
    {
        $profil = ProfilProdi::first();

        $validated = $request->validate([
            'nama_prodi' => 'required|string|max:100',
            'visi' => 'nullable|string',
            'misi' => 'nullable|string',
            'deskripsi' => 'nullable|string',
            'capaian' => 'nullable|string',
            'tujuan' => 'nullable|string',
            'kontak' => 'nullable|string|max:50',
            'alamat' => 'nullable|string|max:200',
            'gambar_header' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('gambar_header')) {
            if ($profil->gambar_header) {
                Storage::disk('public')->delete($profil->gambar_header);
            }
            $validated['gambar_header'] = $request->file('gambar_header')->store('profil', 'public');
        }

        $profil->update($validated);

        return redirect()->route('admin.profil.index')->with('success', 'Profil prodi berhasil diperbarui!');
    }
}