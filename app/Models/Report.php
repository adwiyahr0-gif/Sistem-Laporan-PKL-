<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    // Daftarkan semua kolom yang boleh diisi melalui form
    protected $fillable = [
        'user_id',
        'tanggal', 
        'kegiatan',
        'status',
    ];
}