<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $blueprint) {
            // Menambahkan kolom instansi setelah kolom email
            // nullable() artinya boleh dikosongkan jika belum ada data
            $blueprint->string('instansi')->nullable()->after('email');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $blueprint) {
            // Menghapus kolom jika migration di-rollback
            $blueprint->dropColumn('instansi');
        });
    }
};