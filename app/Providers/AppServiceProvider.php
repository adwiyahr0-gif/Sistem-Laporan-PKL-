<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate; // Tambahan: Untuk fitur keamanan role

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
        // Tambahan: Mendefinisikan aturan bahwa 'admin-only' hanya untuk user dengan role admin
        Gate::define('admin-only', function ($user) {
            return $user->role === 'admin';
        });
    }
}