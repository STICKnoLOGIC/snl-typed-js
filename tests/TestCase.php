<?php

namespace SticknoLogic\SnlType\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use SticknoLogic\SnlType\SnlTypeServiceProvider;

abstract class TestCase extends Orchestra
{
    protected function getPackageProviders($app)
    {
        return [
            SnlTypeServiceProvider::class,
        ];
    }

    protected function getEnvironmentSetUp($app)
    {
        // Setup default configuration
        $app['config']->set('view.paths', [
            __DIR__ . '/../resources/views',
            resource_path('views'),
        ]);
    }
}
