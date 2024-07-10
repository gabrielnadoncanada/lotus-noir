<?php

namespace App\View\Components;

use App\Traits\Themeable;
use Illuminate\View\Component;

class Menu extends Component
{
    use Themeable;

    public array $items;

    public function __construct(array $items, $theme = 'default')
    {
        $this->items = $items;
        $this->theme = $theme;
    }

    public function render()
    {
        return view('components.menu.index');
    }
}
