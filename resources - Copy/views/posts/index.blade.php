@extends('layouts.app')
@section('title', 'Semua Post')

@section('content')
    <x-alert type="success" :message="session('success')" />

    <div class="flex items-center justify-between mb-2">
        <div>
            <h1 class="text-3xl font-extrabold text-slate-900">Semua Post</h1>
            <p class="text-sm text-slate-500 mt-1">
                {{ $posts->total() }} {{ Str::plural('post', $posts->total()) }} dipublikasikan
            </p>
        </div>
        <a href="{{ route('posts.create') }}"
           class="shrink-0 px-4 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white rounded-xl text-sm font-semibold shadow-sm shadow-indigo-200 transition">
            + Post Baru
        </a>
    </div>

    {{-- Pencarian --}}
    <form method="GET" action="{{ route('posts.index') }}" class="mt-6 mb-6 flex gap-2">
        <div class="relative flex-1">
            <span class="absolute left-3 top-1/2 -translate-y-1/2 text-slate-400">🔍</span>
            <input type="text" name="q" value="{{ request('q') }}" placeholder="Cari judul atau isi post..."
                   class="w-full pl-10 pr-3 py-2.5 border-slate-200 rounded-xl shadow-sm text-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
        </div>
        <button class="px-5 py-2.5 bg-slate-800 hover:bg-slate-900 text-white rounded-xl text-sm font-semibold transition">Cari</button>
    </form>

    <div class="space-y-4">
        @forelse ($posts as $post)
            <x-card hover>
                <div class="flex gap-4">
                    @if ($post->image)
                        <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}"
                             class="w-24 h-24 object-cover rounded-xl shrink-0 ring-1 ring-slate-100">
                    @else
                        <div class="w-24 h-24 rounded-xl shrink-0 bg-gradient-to-br from-indigo-100 to-purple-100 flex items-center justify-center text-2xl">📄</div>
                    @endif
                    <div class="min-w-0 flex-1">
                        <h3 class="text-lg font-bold text-slate-900">
                            <a href="{{ route('posts.show', $post) }}" class="hover:text-indigo-600 transition">{{ $post->title }}</a>
                        </h3>
                        <p class="text-xs text-slate-400 mb-2 flex items-center gap-1">🕒 {{ $post->created_at->diffForHumans() }}</p>
                        <p class="text-slate-600 text-sm leading-relaxed">{{ Str::limit(strip_tags($post->body), 150) }}</p>

                        <div class="mt-3 flex gap-4 text-sm font-medium">
                            <a href="{{ route('posts.edit', $post) }}" class="text-indigo-600 hover:text-indigo-800">✏️ Edit</a>
                            <form method="POST" action="{{ route('posts.destroy', $post) }}"
                                  onsubmit="return confirm('Hapus post ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="text-red-500 hover:text-red-700">🗑️ Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            </x-card>
        @empty
            <x-card>
                <div class="text-center py-10">
                    <div class="text-5xl mb-3">{{ request('q') ? '🔎' : '📭' }}</div>
                    <p class="text-slate-500 text-sm">
                        @if (request('q'))
                            Tidak ada post yang cocok dengan pencarian "<span class="font-semibold">{{ request('q') }}</span>".
                        @else
                            Belum ada post. Klik tombol <span class="font-semibold">"+ Post Baru"</span> untuk membuat yang pertama.
                        @endif
                    </p>
                </div>
            </x-card>
        @endforelse
    </div>

    <div class="mt-6">
        {{ $posts->links() }}
    </div>
@endsection
