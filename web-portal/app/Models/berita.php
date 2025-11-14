<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    public $incrementing = false;

    protected $fillable = [
        'judul',
        'isi',
        'gambar',
        'tanggal_publikasi',
        'id_admin',
    ];

    protected $casts = [
        'tanggal_publikasi' => 'date',
    ];

    // Relationships
    public function admin()
    {
        return $this->belongsTo(User::class);
    }
}