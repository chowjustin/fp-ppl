<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Peminjaman;
use App\Models\User;
use App\Observers\PeminjamanObserver;
use App\Repositories\User\UserRepository;
use App\Repositories\User\UserRepositoryInterface;
use App\Repositories\User\UserRepositoryProxy;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            UserRepositoryInterface::class,
            function ($app) {
                /* $realRepository = $app->make(UserRepository::class); */
                return new UserRepositoryProxy(new UserRepository());
            }
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Peminjaman::observe(PeminjamanObserver::class);
    }
}
