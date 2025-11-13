<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReviewController extends Controller
{
    // Store review (DPPL.FR12)
    public function store(Request $request)
    {
        $request->validate([
            'id_karya' => 'required|exists:karyas,id_karya',
            'isi_review' => 'required|string|max:1000',
        ]);

        $karya = Karya::findOrFail($request->id_karya);

        // Check if karya is approved
        if (!$karya->isApproved()) {
            return back()->withErrors(['message' => 'Karya belum divalidasi']);
        }

        Review::create([
            'id_review' => 'RVW' . time(),
            'id_karya' => $request->id_karya,
            'id_user' => auth()->user()->id_user,
            'isi_review' => $request->isi_review,
            'status_moderasi' => 'pending',
            'tanggal_review' => now(),
        ]);

        return back()->with('success', 'Review berhasil dikirim dan menunggu moderasi');
    }

    // Moderate review - Admin only (DPPL.FR14)
    public function moderate(Request $request, $id)
    {
        if (!auth()->user()->isAdmin()) {
            abort(403, 'Unauthorized action.');
        }

        $review = Review::findOrFail($id);

        $request->validate([
            'status_moderasi' => 'required|in:approved,rejected',
        ]);

        $review->update([
            'status_moderasi' => $request->status_moderasi
        ]);

        return back()->with('success', 'Status review berhasil diperbarui');
    }

    // Delete review
    public function destroy($id)
    {
        $review = Review::findOrFail($id);

        // Only admin or review owner can delete
        if (!auth()->user()->isAdmin() && $review->id_user != auth()->user()->id_user) {
            abort(403, 'Unauthorized action.');
        }

        $review->delete();

        return back()->with('success', 'Review berhasil dihapus');
    }

    // Admin: View all reviews for moderation
    public function moderationPage()
    {
        if (!auth()->user()->isAdmin()) {
            abort(403, 'Unauthorized action.');
        }

        $reviews = Review::with(['user', 'karya'])
            ->where('status_moderasi', 'pending')
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        return view('admin.review.moderation', compact('reviews'));
    }
}