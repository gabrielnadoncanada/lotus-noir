<?php

namespace App\Filament\Blocks;

use App\Filament\Blocks\Fields\Buttons;
use App\Filament\Blocks\Fields\RichEditor;
use App\Filament\Blocks\Fields\Heading;
use App\Filament\Blocks\Fields\Image;
use App\Filament\Blocks\Fields\Subtitle;
use App\Models\Page;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Component;

class Banner
{
    public static function make(
        string $name = 'banner',
    ): ConfigurableBlock
    {
        return ConfigurableBlock::make($name)
            ->schema([
                Subtitle::make(),
                Heading::make(),
                RichEditor::make(),
                Image::make(),
                Buttons::make(),
            ]);
    }
}
