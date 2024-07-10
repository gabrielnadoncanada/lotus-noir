<?php

namespace App\Filament\Fields;

use App\Filament\Blocks\BlockSlider;
use Filament\Forms\Components\Builder;

class PageContent
{
    public static function make(
        string $name,
        string $context = 'form',
    ): Builder {
        return Builder::make($name)
            ->blocks([
                BlockSlider::make(),

            ])
            ->addActionLabel('Add block')
            ->collapsible();
    }
}
