<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'karya_id' => 'required|exists:karyas,id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:1000',
        ]);

        // Cek apakah user sudah pernah review
        $existingReview = Review::where('karya_id', $validated['karya_id'])
                               ->where('user_id', Auth::id())
                               ->first();

        if ($existingReview) {
            return back()->with('error', 'Anda sudah memberikan review untuk karya ini.');
        }

        Review::create([
            'karya_id' => $validated['karya_id'],
            'user_id' => Auth::id(),
            'rating' => $validated['rating'],
            'comment' => $validated['comment'],
        ]);

        return back()->with('success', 'Review berhasil ditambahkan! Terima kasih atas feedback Anda.');
    }
}