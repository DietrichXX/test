<?php

namespace App\Providers;

use App\Factories\ShapeFactory;
use App\Interfaces\NotificationInterface;
use App\Interfaces\NotificationServiceInterface;
use App\Interfaces\ProductInterface;
use App\Interfaces\SearchServiceInterface;
use App\Interfaces\ShapeFactoryInterface;
use App\Models\Notifications\EmailNotification;
use App\Models\Notifications\PushNotification;
use App\Models\Notifications\SmsNotification;
use App\Models\Products\DigitalProduct;
use App\Models\Products\PhysicalProduct;
use App\Models\Products\Product;
use App\Services\NotificationService;
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
            return match (true) {
                Request::has('download_link') => new DigitalProduct(),
                Request::has('weight') => new PhysicalProduct(),
                default => new Product(),
            };
        });

        $this->app->bind(ShapeFactoryInterface::class, ShapeFactory::class);

        $this->app->bind(NotificationServiceInterface::class, NotificationService::class);

        $this->app->bind(NotificationInterface::class, function () {
            $type = Request::input('type');
            return match ($type) {
                'email' => new EmailNotification(),
                'push' => new PushNotification(),
                'sms' => new SmsNotification(),
            };
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
