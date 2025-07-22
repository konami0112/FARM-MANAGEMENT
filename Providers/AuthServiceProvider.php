<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Farm::class => FarmPolicy::class,
        Crop::class => CropPolicy::class,
        Livestock::class => LivestockPolicy::class,
        FinancialRecord::class => FinancialRecordPolicy::class,
        MarketLinkage::class => MarketLinkagePolicy::class,
        Advisory::class => AdvisoryPolicy::class,
        FarmActivity::class => FarmActivityPolicy::class,
    ];
    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
    }
}
