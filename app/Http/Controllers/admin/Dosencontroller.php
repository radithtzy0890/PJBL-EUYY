<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dosen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DosenController extends Controller
{
    public function index()
    {
        $dosen = Dosen::orderBy('nama_dosen', 'asc')->get();
        return view('admin.pages.dosen', compact('dosen'));
    }

    public function create()
    {
        return view('admin.pages.tambahdosen');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:100',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'prodi' => 'required|string|max:100',
            'research_interest' => 'nullable|string|max:200',
        ]);

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('dosen', 'public');
        }

        Dosen::create($validated);

        return redirect()
            ->route('dosen.index')
            ->with('success', 'Data dosen berhasil ditambahkan!');
    }


    public function show(string $id)
    {
        $dosen = Dosen::findOrFail($id);
        return view('admin.dosen.show', compact('dosen'));
    }

    public function edit(string $id)
    {
        $dosen = Dosen::findOrFail($id);
        return view('admin.pages.dosen1', compact('dosen'));
    }

    public function update(Request $request, string $id)
    {
        $dosen = Dosen::findOrFail($id);

        $validated = $request->validate([
        'nama' => 'required|string|max:100',
        'prodi' => 'required|string|max:100',
        'research_interest' => 'nullable|string|max:100',
        'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

        if ($request->hasFile('foto')) {

        // Hapus foto lama jika ada
        if ($dosen->foto) {
            Storage::disk('public')->delete($dosen->foto);
        }

        $validated['foto'] = $request->file('foto')->store('dosen', 'public');
    }

    $dosen->update($validated);

    return redirect()->route('dosen.index')
                     ->with('success', 'Data dosen berhasil diperbarui!');
}


    public function destroy(string $id)
    {
        $dosen = Dosen::findOrFail($id);

        if ($dosen->foto) {
            Storage::disk('public')->delete($dosen->foto);
        }

        $dosen->delete();

        return redirect()->route('admin.dosen.index')->with('success', 'Data dosen berhasil dihapus!');
    }
}