<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MataKuliah;
use Illuminate\Http\Request;

class MatkulController extends Controller
{
    public function index()
    {
        $matkul = MataKuliah::orderBy('semester', 'asc')
            ->orderBy('kode_matkul', 'asc')
            ->get()
            ->groupBy('semester');

        return view('admin.matkul.index', compact('matkul'));
    }

    public function create()
    {
        return view('admin.matkul.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_matkul' => 'required|string|max:20|unique:mata_kuliah,kode_matkul',
            'nama_matkul' => 'required|string|max:100',
            'sks_teori' => 'required|integer|min:0|max:10',
            'sks_praktik' => 'required|integer|min:0|max:10',
            'semester' => 'required|integer|min:1|max:8',
        ]);

        MataKuliah::create($validated);

        return redirect()->route('admin.matkul.index')->with('success', 'Data mata kuliah berhasil ditambahkan!');
    }

    public function show(string $id)
    {
        $matkul = MataKuliah::findOrFail($id);
        return view('admin.matkul.show', compact('matkul'));
    }

    public function edit(string $id)
    {
        $matkul = MataKuliah::findOrFail($id);
        return view('admin.matkul.edit', compact('matkul'));
    }

    public function update(Request $request, string $id)
    {
        $matkul = MataKuliah::findOrFail($id);

        $validated = $request->validate([
            'kode_matkul' => 'required|string|max:20|unique:mata_kuliah,kode_matkul,' . $id,
            'nama_matkul' => 'required|string|max:100',
            'sks_teori' => 'required|integer|min:0|max:10',
            'sks_praktik' => 'required|integer|min:0|max:10',
            'semester' => 'required|integer|min:1|max:8',
        ]);

        $matkul->update($validated);

        return redirect()->route('admin.matkul.index')->with('success', 'Data mata kuliah berhasil diupdate!');
    }

    public function destroy(string $id)
    {
        $matkul = MataKuliah::findOrFail($id);
        $matkul->delete();

        return redirect()->route('admin.matkul.index')->with('success', 'Data mata kuliah berhasil dihapus!');
    }
}