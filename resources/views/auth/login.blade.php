<x-guest-layout>
    <div class="text-center mb-10">
        <div class="relative inline-block">
            <div class="absolute -inset-1 bg-indigo-500 rounded-full blur opacity-30"></div>
            <img src="{{ asset('images/binjai_logo.png')}}" alt="" width="100">
            {{-- <img src="https://binjaikota.go.id/uploads/logo/logo_632906e902636.png" 
                 alt="Logo Binjai" class="relative h-20 w-auto mb-4 drop-shadow-2xl"> --}}
        </div>
        
        <h2 class="text-3xl font-black text-white tracking-tighter uppercase">E-LAPORAN PKL</h2>
        <p class="text-[10px] text-indigo-400 font-bold tracking-[0.4em] uppercase opacity-80 mt-1">Diskominfo Kota Binjai</p>
    </div>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-6">
        @csrf

        <div class="relative group">
            <label class="text-[10px] font-bold text-indigo-300 uppercase ml-4 mb-1 block opacity-70">Email Address</label>
            <div class="relative">
                <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-indigo-400">
                    <i class="fa-solid fa-envelope text-sm"></i>
                </span>
                <input id="email" type="email" name="email" :value="old('email')" required autofocus 
                    class="block w-full pl-12 pr-4 py-4 bg-white/5 border border-white/10 rounded-2xl text-white placeholder-indigo-300/30 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:bg-white/10 transition-all"
                    placeholder="nama@email.com">
            </div>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="relative group">
            <label class="text-[10px] font-bold text-indigo-300 uppercase ml-4 mb-1 block opacity-70">Password</label>
            <div class="relative">
                <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-indigo-400">
                    <i class="fa-solid fa-lock text-sm"></i>
                </span>
                <input id="password" type="password" name="password" required 
                    class="block w-full pl-12 pr-4 py-4 bg-white/5 border border-white/10 rounded-2xl text-white placeholder-indigo-300/30 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:bg-white/10 transition-all"
                    placeholder="••••••••">
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex items-center justify-between px-2">
            <label for="remember_me" class="inline-flex items-center cursor-pointer">
                <input id="remember_me" type="checkbox" name="remember" class="rounded border-white/10 bg-white/5 text-indigo-600 focus:ring-indigo-500">
                <span class="ms-2 text-[10px] font-bold text-indigo-300/60 uppercase tracking-tighter italic">Ingat Saya</span>
            </label>
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="text-[10px] font-bold text-indigo-400 hover:text-white transition uppercase tracking-tighter">Lupa Sandi?</a>
            @endif
        </div>

        <button type="submit" 
            class="w-full py-4 bg-indigo-600 hover:bg-indigo-500 text-white font-black text-xs uppercase tracking-[0.2em] rounded-2xl shadow-lg shadow-indigo-500/20 transform active:scale-95 transition-all">
            LOGIN SEKARANG <i class="fa-solid fa-arrow-right ml-2"></i>
        </button>

        <div class="text-center mt-8">
            <p class="text-[10px] text-indigo-300/50 uppercase font-bold tracking-widest">
                Belum punya akun? <a href="{{ route('register') }}" class="text-indigo-400 hover:text-white transition underline">Daftar</a>
            </p>
        </div>
    </form>
</x-guest-layout>