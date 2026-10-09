@extends('layouts.app')
@section('title', 'Post Terhapus')

@section('content')
    <x-alert type="success" :message="session('success')" />

    <h1 class="text-3xl font-extrabold text-slate-900 mb-1">🗑️ Post di Sampah</h1>
    <p class="text-sm text-slate-500 mb-6">Post di sini belum terhapus permanen dan masih bisa dipulihkan.</p>

    <div class="space-y-3">
        @forelse ($posts as $post)
            <x-card>
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="font-bold text-slate-900">{{ $post->title }}</h3>
                        <p class="text-xs text-slate-400 mt-0.5">Dihapus {{ $post->deleted_at->diffForHumans() }}</p>
                    </div>
                    <form method="POST" action="{{ route('posts.restore', $post->id) }}">
                        @csrf
                        @method('PATCH')
                        <button class="text-sm font-semibold text-indigo-600 hover:text-indigo-800 bg-indigo-50 hover:bg-indigo-100 px-4 py-2 rounded-lg transition">
                            ♻️ Pulihkan
                        </button>
                    </form>
                </div>
            </x-card>
        @empty
            <x-card>
                <div class="text-center py-10">
                    <div class="text-5xl mb-3">🗑️</div>
                    <p class="text-slate-500 text-sm">Sampah kosong — tidak ada post yang dihapus.</p>
                </div>
            </x-card>
        @endforelse
    </div>

    <div class="mt-6">{{ $posts->links() }}</div>
@endsection
