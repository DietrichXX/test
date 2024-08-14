<?php

namespace App\Providers;

use App\Http\Actions\ExportTasksCSVAction;
use App\Interfaces\ExportCSVActionInterface;
use Illuminate\Support\ServiceProvider;

class ActionServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(ExportCSVActionInterface::class, ExportTasksCSVAction::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
