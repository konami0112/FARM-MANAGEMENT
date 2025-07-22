<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\TextSummarizationService;


class NLPServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
     $this->app->singleton(TextSummarizationService::class, function ($app) {
            return new TextSummarizationService();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
