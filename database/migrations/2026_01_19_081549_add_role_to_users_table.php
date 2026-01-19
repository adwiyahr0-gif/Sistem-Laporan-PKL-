<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migrasi untuk menambah kolom.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Menambahkan kolom role setelah kolom password
            // Default diset ke 'mahasiswa' agar user yang sudah ada tidak error
            if (!Schema::hasColumn('users', 'role')) {
                $table->string('role')->default('mahasiswa')->after('password');
            }

            // Menambahkan kolom universitas setelah kolom role
            if (!Schema::hasColumn('users', 'universitas')) {
                $table->string('universitas')->nullable()->after('role');
            }
        });
    }

    /**
     * Batalkan migrasi (Rollback).
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Menghapus kolom jika migrasi dibatalkan
            $table->dropColumn(['role', 'universitas']);
        });
    }
};