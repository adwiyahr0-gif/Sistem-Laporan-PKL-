<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Login | E-Laporan PKL</title>

        <script src="https://cdn.tailwindcss.com"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

        <style>
            body {
                margin: 0;
                overflow: hidden;
                background: #0f172a;
            }
            /* Animasi Background Bergerak */
            .bg-animate {
                position: fixed;
                top: 0; left: 0; width: 100%; height: 100%;
                z-index: -1;
                background: linear-gradient(45deg, #0f172a, #1e1b4b, #312e81, #0f172a);
                background-size: 400% 400%;
                animation: gradientBG 15s ease infinite;
            }
            @keyframes gradientBG {
                0% { background-position: 0% 50%; }
                50% { background-position: 100% 50%; }
                100% { background-position: 0% 50%; }
            }
            .glass {
                background: rgba(255, 255, 255, 0.05);
                backdrop-filter: blur(15px);
                border: 1px solid rgba(255, 255, 255, 0.1);
                box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
            }
        </style>
    </head>
    <body class="font-sans antialiased">
        <div class="bg-animate"></div>
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
            <div class="w-full sm:max-w-md mt-6 px-8 py-10 glass rounded-[2.5rem] mx-4">
                {{ $slot }}
            </div>
            <div class="mt-8 text-center text-indigo-300/50 text-[10px] tracking-[0.3em] font-bold uppercase">
                &copy; 2026 DISKOMINFO KOTA BINJAI
            </div>
        </div>
    </body>
</html>