<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany; // Tambahkan ini

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Pastikan kolom 'role' dan 'instansi' ada di sini jika kamu menggunakannya
     * agar bisa disimpan ke database saat registrasi.
     */
    protected $fillable = [
        'name', 
        'email', 
        'password', 
        'role', 
        'instansi'
    ];

    /**
     * Relasi: Satu User (Mahasiswa) memiliki banyak laporan (Report)
     */
    public function reports(): HasMany 
    {
        return $this->hasMany(Report::class);
    }
}