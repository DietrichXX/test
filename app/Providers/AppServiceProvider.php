<?php

namespace App\Providers;

use App\Interfaces\SearchServiceInterface;
use App\Models\Circle;
use App\Models\Rectangle;
use App\Models\Shape;
use App\Models\Square;
use App\Services\TaskSearchService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(SearchServiceInterface::class, TaskSearchService::class);

        $this->app->bind(Shape::class, Square::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
