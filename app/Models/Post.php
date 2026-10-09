<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['title', 'slug', 'body', 'image'];

    // Route Model Binding memakai kolom 'slug', bukan 'id', di URL.
    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    // Bikin slug otomatis dari title setiap kali model dibuat/disimpan.
    protected static function booted(): void
    {
        static::saving(function (Post $post) {
            if (empty($post->slug)) {
                $base = Str::slug($post->title);
                $slug = $base;
                $i = 1;
                while (static::where('slug', $slug)->where('id', '!=', $post->id ?? 0)->exists()) {
                    $slug = $base . '-' . $i++;
                }
                $post->slug = $slug;
            }
        });
    }
}
