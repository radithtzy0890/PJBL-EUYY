<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfilProdi extends Model
{
    protected $guarded = ['id'];

    protected $primaryKey = 'kode_prodi';
    public $incrementing = false;       // karena bukan auto-increment
    protected $keyType = 'string';      // biasanya kode prodi string
}