<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') | Blog Mini</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .hover-lift { transition: transform .15s ease, box-shadow .15s ease; }
        .hover-lift:hover { transform: translateY(-2px); box-shadow: 0 12px 24px -8px rgba(79,70,229,.25); }
    </style>
</head>
<body class="bg-gradient-to-b from-indigo-50 via-slate-50 to-slate-50 text-slate-800 min-h-screen flex flex-col">
    <nav class="bg-gradient-to-r from-indigo-600 via-violet-600 to-purple-600 text-white shadow-lg sticky top-0 z-10">
        <div class="max-w-3xl mx-auto px-4 py-4 flex items-center justify-between">
            <a href="{{ route('welcome') }}" class="font-extrabold text-lg flex items-center gap-2">
                <span class="w-8 h-8 bg-white/20 rounded-lg flex items-center justify-center text-base">📝</span>
                Blog Mini
            </a>
            <div class="flex items-center gap-1 text-sm font-medium">
                <a href="{{ route('posts.index') }}"
                   class="px-3 py-1.5 rounded-lg hover:bg-white/15 transition">Semua Post</a>
                <a href="{{ route('posts.create') }}"
                   class="px-3 py-1.5 rounded-lg hover:bg-white/15 transition">+ Post Baru</a>
                <a href="{{ route('posts.trashed') }}"
                   class="px-3 py-1.5 rounded-lg hover:bg-white/15 transition">🗑️ Sampah</a>
            </div>
        </div>
    </nav>

    <main class="max-w-3xl mx-auto px-4 py-8 flex-1 w-full">
        @yield('content')
    </main>

    <footer class="text-center text-xs text-slate-400 py-6">
        &copy; {{ date('Y') }} — Blog Mini · Dibuat dengan Laravel · Tugas Rutin 10
    </footer>
</body>
</html>
