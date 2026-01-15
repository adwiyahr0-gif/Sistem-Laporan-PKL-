<x-app-layout>
    <div class="mb-8">
        <h2 class="text-2xl font-black text-gray-800 uppercase tracking-tight">Pengaturan Profil</h2>
        <p class="text-sm text-gray-500 font-medium">Kelola informasi akun dan keamanan kata sandi Anda.</p>
    </div>

    <div class="space-y-8">
        <div class="bg-white p-8 rounded-[2.5rem] shadow-sm border border-gray-100 relative overflow-hidden">
            <div class="absolute top-0 right-0 w-32 h-32 bg-indigo-50 rounded-bl-full opacity-50"></div>
            
            <div class="relative">
                <div class="flex items-center mb-6 space-x-4">
                    <div class="p-3 bg-indigo-600 rounded-2xl shadow-lg shadow-indigo-200">
                        <i class="fa-solid fa-user-pen text-white text-xl"></i>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold text-gray-800">Informasi Pribadi</h3>
                        <p class="text-xs text-gray-500 uppercase tracking-widest font-bold">Update profile details</p>
                    </div>
                </div>

                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>
        </div>

        <div class="bg-white p-8 rounded-[2.5rem] shadow-sm border border-gray-100 relative overflow-hidden">
             <div class="absolute top-0 right-0 w-32 h-32 bg-amber-50 rounded-bl-full opacity-50"></div>

            <div class="relative">
                <div class="flex items-center mb-6 space-x-4">
                    <div class="p-3 bg-amber-500 rounded-2xl shadow-lg shadow-amber-200">
                        <i class="fa-solid fa-key text-white text-xl"></i>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold text-gray-800">Keamanan Kata Sandi</h3>
                        <p class="text-xs text-gray-500 uppercase tracking-widest font-bold">Update security password</p>
                    </div>
                </div>

                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>
        </div>

        <div class="bg-red-50/50 p-8 rounded-[2.5rem] border border-red-100">
            <div class="flex items-center mb-6 space-x-4">
                <div class="p-3 bg-red-600 rounded-2xl shadow-lg shadow-red-200">
                    <i class="fa-solid fa-triangle-exclamation text-white text-xl"></i>
                </div>
                <div>
                    <h3 class="text-lg font-bold text-red-800">Zona Bahaya</h3>
                    <p class="text-xs text-red-500 uppercase tracking-widest font-bold">Delete account permanently</p>
                </div>
            </div>

            <div class="max-w-xl">
                @include('profile.partials.delete-user-form')
            </div>
        </div>
    </div>

    <style>
        input[type="text"], input[type="email"], input[type="password"] {
            border-radius: 1rem !important;
            border-color: #e5e7eb !important;
            padding: 0.75rem 1rem !important;
            margin-top: 0.5rem !important;
            width: 100% !important;
        }
        input:focus {
            ring-color: #4f46e5 !important;
            border-color: #4f46e5 !important;
        }
        button[type="submit"]:not(.bg-red-600) {
            background-color: #4f46e5 !important;
            border-radius: 1rem !important;
            padding: 0.75rem 2rem !important;
            font-weight: 800 !important;
            text-transform: uppercase !important;
            letter-spacing: 0.05em !important;
            font-size: 0.75rem !important;
            transition: all 0.3s !important;
        }
        button[type="submit"]:hover {
            box-shadow: 0 10px 15px -3px rgba(79, 70, 229, 0.4) !important;
            transform: translateY(-2px);
        }
    </style>
</x-app-layout>