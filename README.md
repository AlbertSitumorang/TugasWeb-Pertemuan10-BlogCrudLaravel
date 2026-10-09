# TugasWeb-P10-BlogCRUD

**Nama** : Albert Prasetyo Situmorang
**NIM** : 4252250006
**Kelas** : PSIK 25 B — Ilmu Komputer, Universitas Negeri Medan
**Mata Kuliah** : 3KOM40115 Pemrograman Web — Tugas Rutin 10

## Deskripsi
Blog CRUD sederhana dengan Laravel 12: `Route::resource`, Blade layout master,
2 komponen (Alert, Card), validasi per-field, flash message, Route Model Binding
lewat slug, dan pagination. Bonus: pencarian, soft delete, upload gambar.

## Prasyarat
PHP >= 8.2, Composer, MySQL (Laragon/XAMPP).

## Langkah Instalasi
```bash
git clone https://github.com/USERNAME/TugasWeb-P10-BlogCRUD.git
cd TugasWeb-P10-BlogCRUD
composer install
cp .env.example .env
php artisan key:generate
```
1. Buat database `tugasweb_p10` di phpMyAdmin.
2. Sesuaikan `.env`: `DB_CONNECTION=mysql`, `DB_DATABASE=tugasweb_p10`, `DB_USERNAME=root`, `DB_PASSWORD=`.
3. `php artisan migrate`
4. `php artisan storage:link` (wajib, agar gambar upload bisa tampil)
5. `php artisan serve` lalu buka http://127.0.0.1:8000

## Daftar Route (`php artisan route:list`)
| Method | URI | Nama | Fungsi |
|---|---|---|---|
| GET | /posts | posts.index | Daftar post + pencarian + pagination |
| GET | /posts/create | posts.create | Form post baru |
| POST | /posts | posts.store | Simpan post baru |
| GET | /posts/{post} | posts.show | Detail post |
| GET | /posts/{post}/edit | posts.edit | Form edit post |
| PUT/PATCH | /posts/{post} | posts.update | Update post |
| DELETE | /posts/{post} | posts.destroy | Hapus post (soft delete) |
| GET | /posts-trashed | posts.trashed | Bonus: daftar post terhapus |
| PATCH | /posts/{id}/restore | posts.restore | Bonus: pulihkan post |

## Fitur & Requirement
- **Route::resource + named routes** — `routes/web.php`
- **PostController 7 method** — index, create, store, show, edit, update, destroy
- **Blade layout master** — `layouts/app.blade.php` dengan `@extends`/`@yield`
- **2 komponen** — `<x-alert>` (flash message) dan `<x-card>` (bungkus konten)
- **Validasi per-field + old input** — lihat `posts/_form.blade.php` dan `@error`
- **Flash message** — `session('success')` ditampilkan lewat `<x-alert>`
- **@csrf** di semua form, **@method PUT/DELETE/PATCH** untuk update/hapus/restore
- **Route Model Binding** — `Post::getRouteKeyName()` memakai kolom `slug`, jadi URL-nya `/posts/judul-post` bukan `/posts/3`
- **Pagination** — `paginate(6)` + `{{ $posts->links() }}`
- ⭐ **Pencarian** — form `GET` dengan parameter `q` di `posts.index`
- ⭐ **Soft delete** — kolom `deleted_at`, halaman `/posts-trashed` untuk memulihkan
- ⭐ **Upload gambar** — disimpan ke `storage/app/public/posts`, ditampilkan lewat `storage:link`

## Struktur MVC
| Folder | Fungsi |
|---|---|
| `app/Models/Post.php` | Model + slug otomatis + soft delete |
| `app/Http/Controllers/PostController.php` | Logika 7 method resource + bonus |
| `resources/views/posts/` | View: index, create, edit, show, trashed, _form |
| `resources/views/components/` | Component: alert, card |
| `resources/views/layouts/app.blade.php` | Layout master |
| `database/migrations/` | Skema tabel `posts` |

## Screenshot
![Index](screenshots/index.png)
![Create](screenshots/create.png)
![Validasi](screenshots/validasi.png)
![Edit](screenshots/edit.png)
![Show](screenshots/show.png)
![Trashed](screenshots/trashed.png)
