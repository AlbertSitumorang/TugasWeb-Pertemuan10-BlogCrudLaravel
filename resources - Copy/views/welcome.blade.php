<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Selamat Datang | Blog Mini</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .blob {
            position: absolute; border-radius: 9999px; filter: blur(70px); opacity: .35;
        }
        .float { animation: float 6s ease-in-out infinite; }
        .float-delay { animation: float 6s ease-in-out infinite; animation-delay: 1.5s; }
        @keyframes float { 0%,100% { transform: translateY(0); } 50% { transform: translateY(-14px); } }
        .fade-up { animation: fadeUp .7s ease both; }
        .fade-up-1 { animation-delay: .1s; }
        .fade-up-2 { animation-delay: .25s; }
        .fade-up-3 { animation-delay: .4s; }
        @keyframes fadeUp { from { opacity: 0; transform: translateY(16px); } to { opacity: 1; transform: translateY(0); } }
    </style>
</head>
<body class="min-h-screen bg-slate-950 text-white relative overflow-x-hidden">

    {{-- Dekorasi blob warna --}}
    <div class="blob w-96 h-96 bg-indigo-500 -top-20 -left-20 float"></div>
    <div class="blob w-96 h-96 bg-purple-500 top-1/3 -right-20 float-delay"></div>
    <div class="blob w-72 h-72 bg-fuchsia-500 bottom-0 left-1/4 float"></div>

    <div class="relative z-10">
        {{-- Top bar --}}
        <header class="max-w-5xl mx-auto px-6 py-6 flex items-center justify-between">
            <div class="flex items-center gap-2 font-extrabold text-lg">
                <span class="w-9 h-9 bg-white/10 backdrop-blur rounded-xl flex items-center justify-center">📝</span>
                Blog Mini
            </div>
            <a href="{{ route('posts.index') }}"
               class="text-sm font-semibold px-4 py-2 rounded-lg border border-white/20 hover:bg-white/10 transition">
                Lihat Semua Post →
            </a>
        </header>

        {{-- Hero --}}
        <main class="max-w-5xl mx-auto px-6 pt-16 pb-24 text-center">
            <div class="fade-up fade-up-1 inline-flex items-center gap-2 text-xs font-semibold tracking-wide uppercase bg-white/10 backdrop-blur px-4 py-1.5 rounded-full border border-white/10 mb-8">
                🎓 Tugas Rutin 10 &middot; Pemrograman Web
            </div>

            <h1 class="fade-up fade-up-1 text-4xl sm:text-6xl font-extrabold leading-tight mb-6">
                Selamat Datang di
                <span class="block bg-gradient-to-r from-indigo-400 via-fuchsia-400 to-pink-400 bg-clip-text text-transparent">
                    Blog Mini
                </span>
            </h1>

            <p class="fade-up fade-up-2 text-slate-300 text-base sm:text-lg max-w-xl mx-auto mb-10 leading-relaxed">
                Blog CRUD sederhana dibangun dengan Laravel: menulis, mengedit, mencari,
                dan mengelola post — lengkap dengan soft delete dan upload gambar.
            </p>

            <div class="fade-up fade-up-2 flex items-center justify-center gap-4 mb-16">
                <a href="{{ route('posts.index') }}"
                   class="px-7 py-3.5 bg-gradient-to-r from-indigo-500 to-fuchsia-500 hover:from-indigo-600 hover:to-fuchsia-600 rounded-xl font-bold shadow-lg shadow-fuchsia-900/40 transition inline-flex items-center gap-2">
                    Masuk ke Blog <span>→</span>
                </a>
                <a href="{{ route('posts.create') }}"
                   class="px-7 py-3.5 border border-white/20 hover:bg-white/10 rounded-xl font-semibold transition">
                    + Tulis Post Baru
                </a>
            </div>

            {{-- Statistik singkat --}}
            <div class="fade-up fade-up-3 grid grid-cols-3 gap-4 max-w-md mx-auto mb-16">
                <div class="bg-white/5 backdrop-blur border border-white/10 rounded-2xl py-4">
                    <div class="text-2xl font-extrabold">{{ $totalPosts }}</div>
                    <div class="text-xs text-slate-400 mt-1">Post</div>
                </div>
                <div class="bg-white/5 backdrop-blur border border-white/10 rounded-2xl py-4">
                    <div class="text-2xl font-extrabold">{{ $totalTrashed }}</div>
                    <div class="text-xs text-slate-400 mt-1">Di Sampah</div>
                </div>
                <div class="bg-white/5 backdrop-blur border border-white/10 rounded-2xl py-4">
                    <div class="text-2xl font-extrabold">7</div>
                    <div class="text-xs text-slate-400 mt-1">Fitur CRUD</div>
                </div>
            </div>

            {{-- Fitur --}}
            <div class="fade-up fade-up-3 grid sm:grid-cols-2 lg:grid-cols-4 gap-4 text-left">
                <div class="bg-white/5 backdrop-blur border border-white/10 rounded-2xl p-5 hover:bg-white/10 transition">
                    <div class="text-2xl mb-2">✏️</div>
                    <div class="font-bold text-sm mb-1">CRUD Lengkap</div>
                    <div class="text-xs text-slate-400 leading-relaxed">Tulis, lihat, ubah, dan hapus post dengan mudah.</div>
                </div>
                <div class="bg-white/5 backdrop-blur border border-white/10 rounded-2xl p-5 hover:bg-white/10 transition">
                    <div class="text-2xl mb-2">🔍</div>
                    <div class="font-bold text-sm mb-1">Pencarian</div>
                    <div class="text-xs text-slate-400 leading-relaxed">Cari post berdasarkan judul atau isi secara instan.</div>
                </div>
                <div class="bg-white/5 backdrop-blur border border-white/10 rounded-2xl p-5 hover:bg-white/10 transition">
                    <div class="text-2xl mb-2">🗑️</div>
                    <div class="font-bold text-sm mb-1">Soft Delete</div>
                    <div class="text-xs text-slate-400 leading-relaxed">Post terhapus masuk Sampah, bisa dipulihkan kapan saja.</div>
                </div>
                <div class="bg-white/5 backdrop-blur border border-white/10 rounded-2xl p-5 hover:bg-white/10 transition">
                    <div class="text-2xl mb-2">🖼️</div>
                    <div class="font-bold text-sm mb-1">Upload Gambar</div>
                    <div class="text-xs text-slate-400 leading-relaxed">Lengkapi post dengan gambar pendukung.</div>
                </div>
            </div>
        </main>

        <footer class="text-center text-xs text-slate-500 pb-8">
            &copy; {{ date('Y') }} — Blog Mini · Albert Prasetyo Situmorang · Tugas Rutin 10
        </footer>
    </div>
</body>
</html>
