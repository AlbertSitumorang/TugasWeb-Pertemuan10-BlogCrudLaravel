<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class PostController extends Controller
{
    // GET /posts — daftar post + pencarian (bonus) + pagination
    public function index(Request $request): View
    {
        $query = Post::query()->latest();

        if ($request->filled('q')) {
            $keyword = $request->string('q');
            $query->where(function ($q) use ($keyword) {
                $q->where('title', 'like', "%{$keyword}%")
                  ->orWhere('body', 'like', "%{$keyword}%");
            });
        }

        $posts = $query->paginate(6)->withQueryString();

        return view('posts.index', compact('posts'));
    }

    // GET /posts/create
    public function create(): View
    {
        return view('posts.create', ['post' => new Post()]);
    }

    // POST /posts
    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:150'],
            'body'  => ['required', 'string', 'min:10'],
            'image' => ['nullable', 'image', 'max:2048'], // bonus: upload gambar, maks 2MB
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('posts', 'public');
        }

        Post::create($data);

        return redirect()->route('posts.index')->with('success', 'Post berhasil dibuat.');
    }

    // GET /posts/{post} — route model binding lewat slug
    public function show(Post $post): View
    {
        return view('posts.show', compact('post'));
    }

    // GET /posts/{post}/edit
    public function edit(Post $post): View
    {
        return view('posts.edit', compact('post'));
    }

    // PUT/PATCH /posts/{post}
    public function update(Request $request, Post $post): RedirectResponse
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:150'],
            'body'  => ['required', 'string', 'min:10'],
            'image' => ['nullable', 'image', 'max:2048'],
        ]);

        if ($request->hasFile('image')) {
            if ($post->image) {
                Storage::disk('public')->delete($post->image);
            }
            $data['image'] = $request->file('image')->store('posts', 'public');
        }

        // Judul berubah -> biarkan slug lama (URL lama tetap valid).
        // Kalau ingin slug ikut berubah, hapus baris ini.
        unset($data['slug']);

        $post->update($data);

        return redirect()->route('posts.index')->with('success', 'Post berhasil diperbarui.');
    }

    // DELETE /posts/{post} — soft delete (bonus)
    public function destroy(Post $post): RedirectResponse
    {
        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post berhasil dihapus.');
    }

    // Bonus: lihat post yang sudah dihapus (soft delete)
    public function trashed(): View
    {
        $posts = Post::onlyTrashed()->latest()->paginate(6);

        return view('posts.trashed', compact('posts'));
    }

    // Bonus: pulihkan post dari trash
    public function restore(int $id): RedirectResponse
    {
        Post::onlyTrashed()->findOrFail($id)->restore();

        return redirect()->route('posts.trashed')->with('success', 'Post berhasil dipulihkan.');
    }
}
