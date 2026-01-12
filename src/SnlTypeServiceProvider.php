<?php

namespace SticknoLogic\SnlType;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;

class SnlTypeServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Load package views
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'snl-type');

        // Register Blade component
        Blade::component(
            'snl-type',
            \SticknoLogic\SnlType\View\Components\SnlType::class
        );

        // Publish JS asset
        $this->publishes([
            __DIR__.'/../resources/js' => public_path('vendor/snl-type'),
        ], 'snl-type-assets');

        // Global view awareness
        View::composer('*', function ($view) {
            if (app()->bound('snl-type.used')) {
                $view->with('snlTypeScripts', true);
            }
        });
    }
}
