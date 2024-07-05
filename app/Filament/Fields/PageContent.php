<?php

namespace App\Filament\Fields;

use App\Filament\Blocks\RichText;
use App\Filament\Blocks\Slider;
use Filament\Forms\Components\Builder;

class PageContent
{
    public static function make(
        string $name,
        string $context = 'form',
    ): Builder {
        return Builder::make($name)
            ->blocks([
                Slider::make(),

            ])
            ->addActionLabel('Add block')
            ->collapsible();
    }
}
