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

//        $this->app->bind(Shape::class, function () {
//            $length = 10;
//            $width = 8;
//            return new Rectangle($length, $width);
//        });

        $this->app->bind(Shape::class, function () {
            $side = 10;
            return new Square($side);
        });

//        $this->app->bind(Shape::class, function () {
//            $radius = 10;
//            return new Circle($radius);
//        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
