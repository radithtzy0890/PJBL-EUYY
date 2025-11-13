<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Karya extends Model
{
    public $incrementing = false;

    protected $fillable = [
        'user_id',
        'judul_karya',
        'deskripsi',
        'kategori',
        'tahun',
        'file_karya',
        'tim_pembuat',
        'preview',
        'status_validasi',
        'tanggal_upload',
    ];

    protected $casts = [
        'tanggal_upload' => 'date',
    ];

    // Relationships
    // public function user()
    // {
    //     return $this->belongsTo(User::class, 'id_user', 'id_user');
    // }

    // public function reviews()
    // {
    //     return $this->hasMany(Review::class, 'id_karya', 'id_karya');
    // }

    // public function ratings()
    // {
    //     return $this->hasMany(Rating::class, 'id_karya', 'id_karya');
    // }

    // Helper methods
    // public function averageRating()
    // {
    //     return $this->ratings()->avg('nilai') ?? 0;
    // }

    // public function totalReviews()
    // {
    //     return $this->reviews()->where('status_moderasi', 'approved')->count();
    // }

    // public function isApproved()
    // {
    //     return $this->status_validasi === 'disetujui';
    // }
}