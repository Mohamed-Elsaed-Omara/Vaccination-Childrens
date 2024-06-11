<?php

namespace App\Providers;

use App\Events\CreateChild;
use App\Listeners\CreateDosesForChild;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Event;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Event::listen(
            CreateChild::class,
            CreateDosesForChild::class
        );
    }
}
