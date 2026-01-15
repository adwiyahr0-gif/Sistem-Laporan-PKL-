<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migrasi untuk membuat tabel presensi.
     */
    public function up(): void
    {
        Schema::create('presensis', function (Blueprint $table) {
            $table->id();
            
            // Menghubungkan ke tabel users (Jika user dihapus, data absen ikut terhapus)
            $table->foreignId('user_id')
                  ->constrained()
                  ->onDelete('cascade');

            // Data waktu presensi
            $table->date('tanggal')->comment('Tanggal kehadiran');
            $table->time('jam_masuk')->nullable()->comment('Jam saat melakukan check-in');
            $table->time('jam_pulang')->nullable()->comment('Jam saat melakukan check-out');

            /** * Status Kehadiran:
             * 'Hadir' (Tepat waktu)
             * 'Terlambat' (Lewat jam 08:00)
             * 'Izin' / 'Sakit' (Opsional jika ingin dikembangkan)
             */
            $table->string('status')->default('Hadir');

            // Catatan tambahan (Opsional: Misal alasan terlambat atau lokasi GPS)
            $table->text('keterangan')->nullable();

            $table->timestamps();

            // Indexing agar pencarian data absen lebih cepat saat data sudah banyak
            $table->index(['user_id', 'tanggal']);
        });
    }

    /**
     * Batalkan migrasi (Rollback).
     */
    public function down(): void
    {
        Schema::dropIfExists('presensis');
    }
};