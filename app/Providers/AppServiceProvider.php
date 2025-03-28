<?php

namespace App\Providers;

use App\Repositories\Eloquent\BookRepository;
use App\Repositories\Eloquent\CustomerRepository;
use App\Repositories\Eloquent\RentalRepository;
use App\Repositories\Interfaces\BookRepositoryInterface;
use App\Repositories\Interfaces\CustomerRepositoryInterface;
use App\Repositories\Interfaces\RentalRepositoryInterface;
use App\Repositories\TestRepository;
use App\Repositories\TestRepositoryEloquent;
use App\Services\BookService;
use App\Services\CustomerService;
use App\Services\RentalService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        if ($this->app->environment('local') && class_exists(\Laravel\Telescope\TelescopeServiceProvider::class)) {
            $this->app->register(\Laravel\Telescope\TelescopeServiceProvider::class);
            $this->app->register(TelescopeServiceProvider::class);
        }

        $this->app->bind(BookRepositoryInterface::class, BookRepository::class);
        $this->app->bind(CustomerRepositoryInterface::class, CustomerRepository::class);
        $this->app->bind(RentalRepositoryInterface::class, RentalRepository::class);
        $this->app->bind(TestRepository::class, TestRepositoryEloquent::class);

        $this->app->singleton(BookService::class, function ($app) {
            return new BookService($app->make(BookRepositoryInterface::class));
        });

        $this->app->singleton(CustomerService::class, function ($app) {
            return new CustomerService($app->make(CustomerRepositoryInterface::class));
        });

        $this->app->singleton(RentalService::class, function ($app) {
            return new RentalService($app->make(RentalRepositoryInterface::class));
        });


    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
//        Rental::observe(RentalObserver::class);
    }
}
