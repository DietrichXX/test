<?php

namespace App\Providers;

use App\Interfaces\ProductInterface;
use App\Interfaces\SearchServiceInterface;
use App\Models\Products\DigitalProduct;
use App\Models\Products\PhysicalProduct;
use App\Models\Products\Product;
use App\Models\Shapes\Shape;
use App\Models\Shapes\Square;
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
            if (Request::has('download_link')) {
                return new DigitalProduct();
            }else if(Request::has('weight')){
                return new PhysicalProduct();
            }

            return new Product();
        });

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
