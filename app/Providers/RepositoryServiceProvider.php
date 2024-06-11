<?php

namespace App\Providers;

use App\Interface\Vaccination\VaccinationRepositoryInterface;
use App\Repository\Vaccination\VaccinationRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(VaccinationRepositoryInterface::class, VaccinationRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
