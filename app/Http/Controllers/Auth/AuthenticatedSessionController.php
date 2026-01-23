<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        // 1. Tangkap status 'Ingat Saya' dari checkbox
        $remember = $request->boolean('remember');

        // 2. Proses login dengan menyertakan variabel $remember
        $request->authenticate($remember);

        // 3. Regenerasi session untuk keamanan
        $request->session()->regenerate();

        // --- LOGIKA REDIRECT BERDASARKAN ROLE ---
        // Jika user memilih role 'admin' di form atau memang memiliki role admin
        if ($request->role === 'admin') {
            return redirect()->intended(route('admin.dashboard', absolute: false));
        }

        // Default redirect untuk mahasiswa
        return redirect()->intended(route('dashboard', absolute: false));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}