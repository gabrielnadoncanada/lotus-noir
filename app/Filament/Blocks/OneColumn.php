<?php

namespace App\Filament\Blocks;

use App\Filament\Blocks\Fields\Buttons;
use App\Filament\Blocks\Fields\RichEditor;
use App\Filament\Blocks\Fields\Heading;
use App\Filament\Blocks\Fields\Subtitle;
use Filament\Forms\Components\Builder\Block;

class OneColumn
{
    public static function make(
        string $name = 'onecolumn',
    ): Block {
        return Block::make($name)
            ->schema(static::columnSchema());
    }

    public static function columnSchema(): array
    {
        return [
            Subtitle::make(),
            Heading::make(),
            RichEditor::make(),
            Buttons::make(),
        ];
    }
}
