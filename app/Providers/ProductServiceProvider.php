<?php

namespace App\Providers;

use App\services\impl\ProductServiceImpl;
use App\services\ProductService;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class ProductServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public array $singletons  =  [
        ProductService::class => ProductServiceImpl::class,
    ];

    public function provides(): array
    {
        return [
            ProductService::class,
        ];
    }

    /**
     * Register services.
     */
    public function register(): void
    {
//        $this->app->singleton(ProductService::class, function ($app) {
//            return new ProductServiceImpl();
//        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
