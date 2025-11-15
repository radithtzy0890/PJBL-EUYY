<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        $admins = User::whereIn('role', ['admin', 'superadmin'])
                     ->orderBy('created_at', 'desc')
                     ->get();
        
        return view('admin.pages.daftaradmin', compact('admins'));
    }

    public function create()
    {
        return view('admin.pages.tambahadmin');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
            'role' => 'required|in:admin,superadmin',
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => $validated['role'],
        ]);

        return redirect()->route('admin.daftar')
                         ->with('success', 'Admin berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $admin = User::findOrFail($id);
        return view('admin.pages.editadmin', compact('admin'));
    }

    public function update(Request $request, $id)
    {
        $admin = User::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|min:8|confirmed',
            'role' => 'required|in:admin,superadmin',
        ]);

        $admin->name = $validated['name'];
        $admin->email = $validated['email'];
        $admin->role = $validated['role'];

        if ($request->filled('password')) {
            $admin->password = Hash::make($validated['password']);
        }

        $admin->save();

        return redirect()->route('admin.daftar')
                         ->with('success', 'Data admin berhasil diupdate!');
    }

    public function destroy($id)
    {
        $admin = User::findOrFail($id);
        
        if ($admin->id === auth()->id()) {
            return redirect()->route('  admin.daftar')
                           ->with('error', 'Anda tidak bisa menghapus akun sendiri!');
        }

        $admin->delete();

        return redirect()->route('admin.daftar')
                         ->with('success', 'Admin berhasil dihapus!');
    }
}