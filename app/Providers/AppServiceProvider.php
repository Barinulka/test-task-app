<?php

namespace App\Providers;

use App\Repository\OrderRepository\OrderRepository;
use App\Repository\OrderRepository\OrderRepositoryInterface;
use App\Repository\OrderTypeRepository\OrderTypeRepository;
use App\Repository\OrderTypeRepository\OrderTypeRepositoryInterface;
use App\Repository\PartnershipRepository\PartnershipRepository;
use App\Repository\PartnershipRepository\PartnershipRepositoryInterface;
use App\Repository\UserRepository\UserRepository;
use App\Repository\UserRepository\UserRepositoryInterface;
use App\Service\AuthService\AuthService;
use App\Service\AuthService\AuthServiceInterface;
use App\Service\OrderService\OrderService;
use App\Service\OrderService\OrderServiceInterface;
use App\Service\OrderTypeService\OrderTypeService;
use App\Service\OrderTypeService\OrderTypeServiceInterface;
use App\Service\PartnershipService\PartnershipService;
use App\Service\PartnershipService\PartnershipServiceInterface;
use App\Service\RegisterService\RegisterService;
use App\Service\RegisterService\RegisterServiceInterface;
use App\Service\SessionService\SessionService;
use App\Service\SessionService\SessionServiceInterface;
use App\Service\UserService\UserService;
use App\Service\UserService\UserServiceInterface;
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

        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(UserServiceInterface::class, UserService::class);
        $this->app->bind(AuthServiceInterface::class, AuthService::class);

        $this->app->bind(OrderTypeRepositoryInterface::class, OrderTypeRepository::class);
        $this->app->bind(OrderTypeServiceInterface::class, OrderTypeService::class);

        $this->app->bind(RegisterServiceInterface::class, RegisterService::class);

        $this->app->bind(SessionServiceInterface::class, SessionService::class);

        $this->app->bind(PartnershipRepositoryInterface::class, PartnershipRepository::class);
        $this->app->bind(PartnershipServiceInterface::class, PartnershipService::class);

        $this->app->bind(OrderRepositoryInterface::class, OrderRepository::class);
        $this->app->bind(OrderServiceInterface::class, OrderService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
    }
}
