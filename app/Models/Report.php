<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo; // Tambahkan ini

class Report extends Model
{
    // Daftarkan semua kolom yang boleh diisi melalui form
    protected $fillable = [
        'user_id',
        'tanggal', 
        'kegiatan',
        'status',
    ];

    /**
     * Relasi ke model User
     * Menghubungkan user_id di tabel reports ke id di tabel users
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}