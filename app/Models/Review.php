<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'karya_id',
        'user_id',
        'rating',
        'comment',
    ];

    public function karya()
    {
        return $this->belongsTo(Karya::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

    // Relationships
    // public function karya()
    // {
    //     return $this->belongsTo(Karya::class, 'id_karya', 'id_karya');
    // }

    // public function user()
    // {
    //     return $this->belongsTo(User::class, 'id_user', 'id_user');
    // }
