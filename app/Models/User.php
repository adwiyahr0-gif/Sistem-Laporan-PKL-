<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Properti fillable memungkinkan kolom-kolom ini diisi secara massal.
     * Saya menambahkan 'role' dan 'universitas' sesuai dengan migration terakhir kita.
     */
    protected $fillable = [
        'name', 
        'email', 
        'password', 
        'role', 
        'instansi',      // Tetap ada jika kamu sudah punya kolom ini
        'universitas'    // Ditambahkan sesuai migration add_role_to_users_table
    ];

    /**
     * Hidden fields untuk keamanan.
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Casting field.
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Relasi: Satu User (Mahasiswa) memiliki banyak laporan (Report)
     */
    public function reports(): HasMany 
    {
        return $this->hasMany(Report::class);
    }

    /**
     * Helper untuk cek role (Opsional tapi berguna)
     */
    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }
}