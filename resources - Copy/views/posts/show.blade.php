@extends('layouts.app')
@section('title', $post->title)

@section('content')
    <a href="{{ route('posts.index') }}" class="text-sm text-indigo-600 hover:text-indigo-800 font-medium inline-flex items-center gap-1">
        ← Kembali ke Semua Post
    </a>

    <x-card class="mt-4">
        @if ($post->image)
            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}"
                 class="w-full h-64 object-cover rounded-xl mb-6 ring-1 ring-slate-100">
        @endif
        <h1 class="text-3xl font-extrabold text-slate-900 mb-2">{{ $post->title }}</h1>
        <p class="text-sm text-slate-400 mb-6 flex items-center gap-1">
            🕒 {{ $post->created_at->translatedFormat('d F Y, H:i') }}
        </p>
        <div class="prose max-w-none text-slate-700 leading-relaxed whitespace-pre-line">{{ $post->body }}</div>

        <div class="mt-8 pt-6 border-t border-slate-100 flex gap-4 text-sm font-medium">
            <a href="{{ route('posts.edit', $post) }}" class="text-indigo-600 hover:text-indigo-800">✏️ Edit Post Ini</a>
        </div>
    </x-card>
@endsection
