<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Presensi extends Model
{
    use HasFactory;

    /**
     * Kolom yang dapat diisi secara massal.
     */
    protected $fillable = [
        'user_id',
        'tanggal',
        'jam_masuk',
        'jam_pulang',
        'status',
        'keterangan',
    ];

    /**
     * Relasi ke model User.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}