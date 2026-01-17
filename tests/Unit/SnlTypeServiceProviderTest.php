<?php

namespace SticknoLogic\SnlType\Tests\Unit;

use SticknoLogic\SnlType\Tests\TestCase;
use SticknoLogic\SnlType\View\Components\SnlType;
use Illuminate\Support\Facades\Blade;

class SnlTypeServiceProviderTest extends TestCase
{
    /** @test */
    public function it_registers_the_blade_component()
    {
        $registeredComponents = Blade::getClassComponentAliases();

        $this->assertArrayHasKey('snl-type', $registeredComponents);
        $this->assertEquals(SnlType::class, $registeredComponents['snl-type']);
    }

    /** @test */
    public function it_loads_views_from_correct_namespace()
    {
        $this->assertTrue(view()->exists('snl-type::components.snl-type'));
    }

    /** @test */
    public function service_provider_is_loaded()
    {
        $providers = $this->app->getLoadedProviders();

        $this->assertArrayHasKey('SticknoLogic\\SnlType\\SnlTypeServiceProvider', $providers);
    }
}
