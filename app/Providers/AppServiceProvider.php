<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate; // Untuk fitur keamanan role
use Illuminate\Pagination\Paginator; // Tambahan: Import Paginator untuk Pagination

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // 1. Mengaktifkan Pagination menggunakan style Tailwind CSS
        Paginator::useTailwind();

        // 2. Mendefinisikan aturan bahwa 'admin-only' hanya untuk user dengan role admin
        Gate::define('admin-only', function ($user) {
            return $user->role === 'admin';
        });
    }
}