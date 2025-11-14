<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use App\Models\Karya;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function store(Request $request)
    {
        // Pastikan user login
        $user = auth()->user();
        if (!$user) {
            return back()->withErrors(['message' => 'Silakan login terlebih dahulu sebelum memberi rating.']);
        }

        // Validasi input
        $request->validate([
            'id_karya' => 'required|exists:karyas,id_karya',
            'nilai' => 'required|integer|min:1|max:5',
        ]);

        $karya = Karya::findOrFail($request->id_karya);

        // Kalau punya fungsi isApproved, cek status validasinya
        if (method_exists($karya, 'isApproved') && !$karya->isApproved()) {
            return back()->withErrors(['message' => 'Karya belum divalidasi.']);
        }

        // Cek apakah user sudah pernah memberi rating
        $existingRating = Rating::where('id_karya', $request->id_karya)
            ->where('id_user', $user->id ?? $user->id_user)
            ->first();

        if ($existingRating) {
            // Update rating
            $existingRating->update([
                'nilai' => $request->nilai,
                'tanggal_rating' => now(),
            ]);

            return back()->with('success', 'Rating berhasil diperbarui.');
        }

        // Buat rating baru
        Rating::create([
            'id_rating' => 'RTG' . time() . rand(100, 999),
            'id_karya' => $request->id_karya,
            'id_user' => $user->id ?? $user->id_user,
            'nilai' => $request->nilai,
            'tanggal_rating' => now(),
        ]);

        return back()->with('success', 'Rating berhasil diberikan.');
    }

    public function destroy($id)
    {
        $user = auth()->user();
        if (!$user) {
            return back()->withErrors(['message' => 'Silakan login terlebih dahulu.']);
        }

        $rating = Rating::findOrFail($id);

        // Hanya pemilik rating atau admin yang bisa hapus
        if (method_exists($user, 'isAdmin')) {
            if (!$user->isAdmin() && $rating->id_user != ($user->id ?? $user->id_user)) {
                abort(403, 'Unauthorized action.');
            }
        } else {
            if ($rating->id_user != ($user->id ?? $user->id_user)) {
                abort(403, 'Unauthorized action.');
            }
        }

        $rating->delete();

        return back()->with('success', 'Rating berhasil dihapus.');
    }
}
