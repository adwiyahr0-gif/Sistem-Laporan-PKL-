<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\User; // Tambahkan ini jika belum ada

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
        // --- TAMBAHAN KEAMANAN: Validasi kecocokan Role ---
        // Kita cek dulu apakah user yang mencoba login memiliki role yang sesuai dengan dropdown
        $user = User::where('email', $request->email)->first();

        if ($user && $user->role !== $request->role) {
            return back()->withErrors([
                'email' => 'Akses ditolak. Akun Anda terdaftar sebagai ' . strtoupper($user->role) . ', bukan ' . strtoupper($request->role) . '.',
            ]);
        }

        // 1. Tangkap status 'Ingat Saya' dari checkbox
        $remember = $request->boolean('remember');

        // 2. Proses login dengan menyertakan variabel $remember
        $request->authenticate($remember);

        // 3. Regenerasi session untuk keamanan
        $request->session()->regenerate();

        // --- LOGIKA REDIRECT BERDASARKAN ROLE ---
        // Menggunakan auth()->user()->role lebih aman karena mengambil data langsung dari database setelah login
        if (auth()->user()->role === 'admin') {
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