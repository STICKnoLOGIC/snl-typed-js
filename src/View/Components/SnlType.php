<?php

namespace SticknoLogic\SnlType\View\Components;

use Illuminate\View\Component;

class SnlType extends Component
{
    public string $text;

    public function __construct(string $text = '')
    {
        $this->text = $text;
    }

    public function render()
    {
        // Mark that this component was used
        app()->singleton('snl-type.used', fn () => true);

        return view('snl-type::components.snl-type');
    }
}
