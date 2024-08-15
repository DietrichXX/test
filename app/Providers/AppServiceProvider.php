<?php

namespace App\Providers;

use App\Factories\ShapeFactory;
use App\Interfaces\ProductInterface;
use App\Interfaces\SearchServiceInterface;
use App\Interfaces\ShapeFactoryInterface;
use App\Models\Products\DigitalProduct;
use App\Models\Products\PhysicalProduct;
use App\Models\Products\Product;
use App\Services\TaskSearchService;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(SearchServiceInterface::class, TaskSearchService::class);

        $this->app->bind(ProductInterface::class, function () {
            match (true) {
                Request::has('download_link') => new DigitalProduct(),
                Request::has('weight') => new PhysicalProduct(),
                default => new Product(),
            };
        });

        $this->app->bind(ShapeFactoryInterface::class, ShapeFactory::class);

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
