<?php

namespace App\Providers;

use App\Data\CustomFrontmatterData;
use BenBjurstrom\Prezet\Data\FrontmatterData;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(FrontmatterData::class, CustomFrontmatterData::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
