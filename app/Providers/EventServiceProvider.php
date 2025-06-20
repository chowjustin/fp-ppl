<?php
namespace App\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $observers = [
        \App\Models\Peminjaman::class => [\App\Observers\PeminjamanObserver::class],
    ];

    public function boot(): void
    {
        //
    }
}