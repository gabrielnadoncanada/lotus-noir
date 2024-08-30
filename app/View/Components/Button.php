<?php

namespace App\View\Components;

use App\Traits\Themeable;
use Illuminate\View\Component;

class Button extends Component
{
    use Themeable;

    public function __construct($theme = 'default')
    {
        $this->theme = $theme;
    }

    public function render()
    {
        return view('components.button');
    }
}
