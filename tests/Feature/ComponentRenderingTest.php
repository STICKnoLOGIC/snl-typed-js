<?php

namespace SticknoLogic\SnlType\Tests\Feature;

use SticknoLogic\SnlType\Tests\TestCase;
use Illuminate\Support\Facades\Blade;

class ComponentRenderingTest extends TestCase
{
    /** @test */
    public function it_renders_basic_component_with_strings()
    {
        $rendered = Blade::render(
            '<x-snl-type :strings="[\'Hello\', \'World\']" />'
        );

        $this->assertStringContainsString('initSnlTyped', $rendered);
        $this->assertStringContainsString('"Hello"', $rendered);
        $this->assertStringContainsString('"World"', $rendered);
        $this->assertStringContainsString('typed.js', $rendered);
    }

    /** @test */
    public function it_renders_with_custom_id()
    {
        $rendered = Blade::render(
            '<x-snl-type id="custom-id" :strings="[\'Test\']" />'
        );

        $this->assertStringContainsString('id="custom-id"', $rendered);
        $this->assertStringContainsString('#custom-id', $rendered);
    }

    /** @test */
    public function it_renders_with_slot_content()
    {
        $rendered = Blade::render(
            '<x-snl-type><p>Hello</p><p>World</p></x-snl-type>'
        );

        $this->assertStringContainsString('stringsElement', $rendered);
        $this->assertStringContainsString('<p>Hello</p>', $rendered);
        $this->assertStringContainsString('<p>World</p>', $rendered);
        $this->assertStringContainsString('display: none', $rendered);
    }

    /** @test */
    public function it_renders_with_custom_type_speed()
    {
        $rendered = Blade::render(
            '<x-snl-type :strings="[\'Test\']" :type-speed="100" />'
        );

        $this->assertStringContainsString('typeSpeed: 100', $rendered);
    }

    /** @test */
    public function it_renders_with_default_type_speed()
    {
        $rendered = Blade::render(
            '<x-snl-type :strings="[\'Test\']" />'
        );

        $this->assertStringContainsString('typeSpeed: 60', $rendered);
    }

    /** @test */
    public function it_renders_with_custom_delays()
    {
        $rendered = Blade::render(
            '<x-snl-type :strings="[\'Test\']" :start-delay="1000" :back-delay="2000" />'
        );

        $this->assertStringContainsString('startDelay: 1000', $rendered);
        $this->assertStringContainsString('backDelay: 2000', $rendered);
    }

    /** @test */
    public function it_renders_with_custom_back_speed()
    {
        $rendered = Blade::render(
            '<x-snl-type :strings="[\'Test\']" :back-speed="50" />'
        );

        $this->assertStringContainsString('backSpeed: 50', $rendered);
    }

    /** @test */
    public function it_renders_boolean_options_correctly()
    {
        $rendered = Blade::render(
            '<x-snl-type :strings="[\'Test\']" :loop="false" :shuffle="true" :show-cursor="false" :smart-backspace="false" />'
        );

        $this->assertStringContainsString('loop: false', $rendered);
        $this->assertStringContainsString('shuffle: true', $rendered);
        $this->assertStringContainsString('showCursor: false', $rendered);
        $this->assertStringContainsString('smartBackspace: false', $rendered);
    }

    /** @test */
    public function it_renders_with_default_boolean_values()
    {
        $rendered = Blade::render(
            '<x-snl-type :strings="[\'Test\']" />'
        );

        $this->assertStringContainsString('loop: true', $rendered);
        $this->assertStringContainsString('shuffle: false', $rendered);
        $this->assertStringContainsString('showCursor: true', $rendered);
        $this->assertStringContainsString('smartBackspace: true', $rendered);
    }

    /** @test */
    public function it_renders_with_custom_cursor()
    {
        $rendered = Blade::render(
            '<x-snl-type :strings="[\'Test\']" cursor="_" />'
        );

        $this->assertStringContainsString('cursorChar: \'_\'', $rendered);
    }

    /** @test */
    public function it_renders_with_default_cursor()
    {
        $rendered = Blade::render(
            '<x-snl-type :strings="[\'Test\']" />'
        );

        $this->assertStringContainsString('cursorChar: \'|\'', $rendered);
    }

    /** @test */
    public function it_renders_with_font_size_styling()
    {
        $rendered = Blade::render(
            '<x-snl-type :strings="[\'Test\']" font-size="2rem" />'
        );

        $this->assertStringContainsString('font-size: 2rem', $rendered);
    }

    /** @test */
    public function it_renders_with_color_styling()
    {
        $rendered = Blade::render(
            '<x-snl-type :strings="[\'Test\']" color="#3490dc" />'
        );

        $this->assertStringContainsString('color: #3490dc', $rendered);
    }

    /** @test */
    public function it_renders_with_both_font_size_and_color()
    {
        $rendered = Blade::render(
            '<x-snl-type :strings="[\'Test\']" font-size="3rem" color="#ff0000" />'
        );

        $this->assertStringContainsString('font-size: 3rem', $rendered);
        $this->assertStringContainsString('color: #ff0000', $rendered);
    }

    /** @test */
    public function it_includes_typed_js_cdn_script()
    {
        $rendered = Blade::render(
            '<x-snl-type :strings="[\'Test\']" />'
        );

        $this->assertStringContainsString('https://cdn.jsdelivr.net/gh/sticknologic/typed.js@main/dist/typed.umd.js', $rendered);
        $this->assertStringContainsString('defer', $rendered);
    }

    /** @test */
    public function it_includes_init_function()
    {
        $rendered = Blade::render(
            '<x-snl-type :strings="[\'Test\']" />'
        );

        $this->assertStringContainsString('function initSnlTyped', $rendered);
        $this->assertStringContainsString('new Typed', $rendered);
    }

    /** @test */
    public function it_renders_complete_component_with_all_options()
    {
        $rendered = Blade::render(
            '<x-snl-type 
                id="full-test"
                :strings="[\'First\', \'Second\', \'Third\']"
                :type-speed="50"
                :back-speed="30"
                :back-delay="1000"
                :start-delay="500"
                :loop="true"
                :shuffle="false"
                :show-cursor="true"
                :smart-backspace="true"
                font-size="2rem"
                color="#3490dc"
                cursor="_"
            />'
        );

        $this->assertStringContainsString('id="full-test"', $rendered);
        $this->assertStringContainsString('"First"', $rendered);
        $this->assertStringContainsString('"Second"', $rendered);
        $this->assertStringContainsString('"Third"', $rendered);
        $this->assertStringContainsString('typeSpeed: 50', $rendered);
        $this->assertStringContainsString('backSpeed: 30', $rendered);
        $this->assertStringContainsString('backDelay: 1000', $rendered);
        $this->assertStringContainsString('startDelay: 500', $rendered);
        $this->assertStringContainsString('loop: true', $rendered);
        $this->assertStringContainsString('shuffle: false', $rendered);
        $this->assertStringContainsString('showCursor: true', $rendered);
        $this->assertStringContainsString('smartBackspace: true', $rendered);
        $this->assertStringContainsString('font-size: 2rem', $rendered);
        $this->assertStringContainsString('color: #3490dc', $rendered);
        $this->assertStringContainsString('cursorChar: \'_\'', $rendered);
    }
}
