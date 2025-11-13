<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    protected $fillable = [
        'prodi_id',
        'nama_dosen',
        'email',
        'bidang_keahlian',
        'foto',
        'status',
    ];

    // Relationships
    // public function profilProdi()
    // {
    //     return $this->belongsTo(ProfilProdi::class, 'id_prodi', 'id_prodi');
    // }
}