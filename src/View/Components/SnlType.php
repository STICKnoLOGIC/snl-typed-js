<?php

namespace SticknoLogic\SnlType\View\Components;

use Illuminate\Support\Str;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

/**
 * SnlType Blade Component
 * 
 * Renders a typing animation using Typed.js library
 */
class SnlType extends Component
{
    public string $id;
    public array $strings;
    public bool $smartBackspace;
    public bool $shuffle;
    public bool $loop;
    public bool $showCursor;
    public ?int $typeSpeed;
    public ?int $startDelay;
    public ?int $backSpeed;
    public ?int $backDelay;
    public ?string $fontSize;
    public ?string $color;
    public ?string $cursor;
    public bool $hasSlotContent = false;

    /**
     * Create a new component instance.
     *
     * @param string|null $id Unique identifier for the typed element
     * @param array|string|null $strings Text strings to type
     * @param bool|null $smartBackspace Smart backspace feature
     * @param bool|null $shuffle Shuffle the strings
     * @param bool|null $loop Loop the animation
     * @param bool|null $showCursor Show typing cursor
     * @param int|null $typeSpeed Typing speed in milliseconds
     * @param int|null $startDelay Start delay in milliseconds
     * @param int|null $backSpeed Backspace speed in milliseconds
     * @param int|null $backDelay Backspace delay in milliseconds
     * @param string|null $fontSize Font size CSS value
     * @param string|null $color Text color CSS value
     * @param string|null $cursor Custom cursor character
     */
    public function __construct(
        ?string $id = null,
        array|string|null $strings = null,
        ?bool $smartBackspace = null,
        ?bool $shuffle = null,
        ?bool $loop = null,
        ?bool $showCursor = null,
        ?int $typeSpeed = null,
        ?int $startDelay = null,
        ?int $backSpeed = null,
        ?int $backDelay = null,
        ?string $fontSize = null,
        ?string $color = null,
        ?string $cursor = null
    ) {
        $this->id = $id ?? Str::random(4);
        $this->strings = is_string($strings) ? [$strings] : ($strings ?? []);
        $this->smartBackspace = $smartBackspace ?? true;
        $this->shuffle = $shuffle ?? false;
        $this->loop = $loop ?? true;
        $this->showCursor = $showCursor ?? true;
        $this->typeSpeed = $typeSpeed;
        $this->startDelay = $startDelay;
        $this->backSpeed = $backSpeed;
        $this->backDelay = $backDelay;
        $this->fontSize = $fontSize;
        $this->color = $color;
        $this->cursor = $cursor;
    }

    /**
     * Check if slot content should be used
     */
    public function shouldUseSlot($slot): bool
    {
        return !empty(trim($slot));
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        if (!app()->bound('snl-type.used')) {
            app()->singleton('snl-type.used', fn () => true);
        }

        return view('snl-type::components.snl-type');
    }
}
