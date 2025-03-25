<?php

namespace App\Providers;

use App\Repository\UserRepository\UserRepository;
use App\Repository\UserRepository\UserRepositoryInterface;
use App\Service\AuthService\AuthService;
use App\Service\AuthService\AuthServiceInterface;
use App\Service\RegisterService\RegisterService;
use App\Service\RegisterService\RegisterServiceInterface;
use App\Service\SessionService\SessionService;
use App\Service\SessionService\SessionServiceInterface;
use Illuminate\Support\ServiceProvider;
use Laravel\Passport\Passport;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        Passport::ignoreRoutes();

        /*Repositories*/
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);

        /*Services*/
        $this->app->bind(RegisterServiceInterface::class, RegisterService::class);
        $this->app->bind(AuthServiceInterface::class, AuthService::class);
        $this->app->bind(SessionServiceInterface::class, SessionService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
    }
}
