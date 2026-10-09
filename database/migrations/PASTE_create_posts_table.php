<?php
// Ganti isi database/migrations/xxxx_xx_xx_xxxxxx_create_posts_table.php
// (hasil dari: php artisan make:model Post -m) dengan file ini.

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('body');
            $table->string('image')->nullable();   // bonus: upload gambar
            $table->timestamps();
            $table->softDeletes();                  // bonus: soft delete
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
