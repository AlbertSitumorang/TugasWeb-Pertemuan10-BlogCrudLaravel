<?php

use App\Http\Controllers\PostController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

// Halaman Selamat Datang (landing page)
Route::get('/', function () {
    return view('welcome', [
        'totalPosts'   => Post::count(),
        'totalTrashed' => Post::onlyTrashed()->count(),
    ]);
})->name('welcome');

// Named routes: posts.index, posts.create, posts.store, posts.show,
// posts.edit, posts.update, posts.destroy — otomatis dari resource().
Route::resource('posts', PostController::class);

// Bonus: lihat/pulihkan post yang di-soft-delete
Route::get('/posts-trashed', [PostController::class, 'trashed'])->name('posts.trashed');
Route::patch('/posts/{id}/restore', [PostController::class, 'restore'])
    ->name('posts.restore');
