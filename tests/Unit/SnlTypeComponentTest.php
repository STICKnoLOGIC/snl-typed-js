<?php

namespace SticknoLogic\SnlType\Tests\Unit;

use SticknoLogic\SnlType\Tests\TestCase;
use SticknoLogic\SnlType\View\Components\SnlType;
use Illuminate\Support\Str;

class SnlTypeComponentTest extends TestCase
{
    /** @test */
    public function it_can_be_instantiated()
    {
        $component = new SnlType();

        $this->assertInstanceOf(SnlType::class, $component);
    }

    /** @test */
    public function it_generates_random_id_when_not_provided()
    {
        $component = new SnlType();

        $this->assertNotEmpty($component->id);
        $this->assertEquals(4, strlen($component->id));
    }

    /** @test */
    public function it_accepts_custom_id()
    {
        $customId = 'my-custom-id';
        $component = new SnlType(id: $customId);

        $this->assertEquals($customId, $component->id);
    }

    /** @test */
    public function it_handles_strings_as_array()
    {
        $strings = ['Hello', 'World'];
        $component = new SnlType(strings: $strings);

        $this->assertEquals($strings, $component->strings);
    }

    /** @test */
    public function it_converts_string_to_array()
    {
        $string = 'Hello World';
        $component = new SnlType(strings: $string);

        $this->assertEquals([$string], $component->strings);
    }

    /** @test */
    public function it_handles_null_strings()
    {
        $component = new SnlType();

        $this->assertEquals([], $component->strings);
    }

    /** @test */
    public function it_sets_default_boolean_values()
    {
        $component = new SnlType();

        $this->assertTrue($component->smartBackspace);
        $this->assertFalse($component->shuffle);
        $this->assertTrue($component->loop);
        $this->assertTrue($component->showCursor);
    }

    /** @test */
    public function it_accepts_custom_boolean_values()
    {
        $component = new SnlType(
            smartBackspace: false,
            shuffle: true,
            loop: false,
            showCursor: false
        );

        $this->assertFalse($component->smartBackspace);
        $this->assertTrue($component->shuffle);
        $this->assertFalse($component->loop);
        $this->assertFalse($component->showCursor);
    }

    /** @test */
    public function it_accepts_speed_and_delay_values()
    {
        $component = new SnlType(
            typeSpeed: 50,
            startDelay: 1000,
            backSpeed: 30,
            backDelay: 2000
        );

        $this->assertEquals(50, $component->typeSpeed);
        $this->assertEquals(1000, $component->startDelay);
        $this->assertEquals(30, $component->backSpeed);
        $this->assertEquals(2000, $component->backDelay);
    }

    /** @test */
    public function it_handles_null_speed_and_delay_values()
    {
        $component = new SnlType();

        $this->assertNull($component->typeSpeed);
        $this->assertNull($component->startDelay);
        $this->assertNull($component->backSpeed);
        $this->assertNull($component->backDelay);
    }

    /** @test */
    public function it_accepts_styling_options()
    {
        $component = new SnlType(
            fontSize: '2rem',
            color: '#3490dc',
            cursor: '_'
        );

        $this->assertEquals('2rem', $component->fontSize);
        $this->assertEquals('#3490dc', $component->color);
        $this->assertEquals('_', $component->cursor);
    }

    /** @test */
    public function it_handles_null_styling_options()
    {
        $component = new SnlType();

        $this->assertNull($component->fontSize);
        $this->assertNull($component->color);
        $this->assertNull($component->cursor);
    }

    /** @test */
    public function should_use_slot_returns_true_for_non_empty_content()
    {
        $component = new SnlType();

        $this->assertTrue($component->shouldUseSlot('<p>Hello</p>'));
        $this->assertTrue($component->shouldUseSlot('Some text'));
    }

    /** @test */
    public function should_use_slot_returns_false_for_empty_content()
    {
        $component = new SnlType();

        $this->assertFalse($component->shouldUseSlot(''));
        $this->assertFalse($component->shouldUseSlot('   '));
        $this->assertFalse($component->shouldUseSlot("\n\t  "));
    }

    /** @test */
    public function it_returns_a_view()
    {
        $component = new SnlType();
        $view = $component->render();

        $this->assertEquals('snl-type::components.snl-type', $view->name());
    }

    /** @test */
    public function it_accepts_all_parameters_together()
    {
        $component = new SnlType(
            id: 'test-id',
            strings: ['First', 'Second'],
            smartBackspace: false,
            shuffle: true,
            loop: false,
            showCursor: false,
            typeSpeed: 100,
            startDelay: 500,
            backSpeed: 50,
            backDelay: 1500,
            fontSize: '3rem',
            color: '#ff0000',
            cursor: '▌'
        );

        $this->assertEquals('test-id', $component->id);
        $this->assertEquals(['First', 'Second'], $component->strings);
        $this->assertFalse($component->smartBackspace);
        $this->assertTrue($component->shuffle);
        $this->assertFalse($component->loop);
        $this->assertFalse($component->showCursor);
        $this->assertEquals(100, $component->typeSpeed);
        $this->assertEquals(500, $component->startDelay);
        $this->assertEquals(50, $component->backSpeed);
        $this->assertEquals(1500, $component->backDelay);
        $this->assertEquals('3rem', $component->fontSize);
        $this->assertEquals('#ff0000', $component->color);
        $this->assertEquals('▌', $component->cursor);
    }
}
