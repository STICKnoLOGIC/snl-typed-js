<?php

namespace SticknoLogic\SnlType;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use SticknoLogic\SnlType\View\Components\SnlType;

/**
 * Registers the SNL Type component and its views
 */
class SnlTypeServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'snl-type');

        Blade::component('snl-type', SnlType::class);

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../resources/views' => resource_path('views/vendor/snl-type'),
            ], 'snl-type-views');
        }
    }

    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }
}
