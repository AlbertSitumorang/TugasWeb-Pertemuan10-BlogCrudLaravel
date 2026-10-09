<?php
// Tambahkan 2 baris ini ke dalam method boot() di app/Providers/AppServiceProvider.php
// supaya tulisan "2 minutes ago" berubah jadi "2 menit lalu" di seluruh aplikasi.

namespace App\Providers;

use Illuminate\Support\Carbon;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        Carbon::setLocale(config('app.locale')); // <-- baris yang ditambahkan
    }
}
