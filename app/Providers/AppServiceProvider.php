<?php

namespace App\Providers;

use App\Repositories\Contracts\LoginContract;
use App\Repositories\Contracts\SoalContract;
use App\Repositories\Contracts\UserContract;
use App\Repositories\LoginRepository;
use App\Repositories\SoalRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(SoalContract::class, SoalRepository::class);
        $this->app->bind(UserContract::class, UserRepository::class);
        $this->app->bind(LoginContract::class, LoginRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
