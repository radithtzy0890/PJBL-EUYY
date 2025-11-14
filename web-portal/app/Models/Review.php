<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'karya_id',
        'user_id',
        'isi_review',
        'status_moderasi',
        'tanggal_review',
    ];

    protected $casts = [
        'tanggal_review' => 'date',
    ];

    // Relationships
    // public function karya()
    // {
    //     return $this->belongsTo(Karya::class, 'id_karya', 'id_karya');
    // }

    // public function user()
    // {
    //     return $this->belongsTo(User::class, 'id_user', 'id_user');
    // }
}