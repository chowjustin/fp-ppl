<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Peminjaman;
use App\Observers\PeminjamanObserver;
use App\Repositories\User\UserRepository;
use App\Repositories\User\UserRepositoryInterface;
use App\Repositories\User\UserRepositoryProxy;
use App\Services\UserService;

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
                return new UserRepositoryProxy(new UserRepository());
            }
        );

        $this->app->singleton('userService', function ($app) {
            return new UserService(
                $app->make(UserRepositoryInterface::class)
            );
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Peminjaman::observe(PeminjamanObserver::class);
    }
}
