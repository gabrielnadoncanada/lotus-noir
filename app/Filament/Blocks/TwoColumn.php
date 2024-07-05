<?php

namespace App\Filament\Blocks;

use App\Filament\Blocks\Fields\Buttons;
use App\Filament\Blocks\Fields\RichEditor;
use App\Filament\Blocks\Fields\Heading;
use App\Filament\Blocks\Fields\Subtitle;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Group;

class TwoColumn
{
    public static function make(
        string $name = 'twocolumn',
    ): Block {
        return Block::make($name)
            ->schema([
                Group::make()
                    ->columns()
                    ->schema([
                        Group::make()
                            ->statePath('left')
                            ->schema(static::columnSchema()),
                        Group::make()
                            ->statePath('right')
                            ->schema(static::columnSchema()),
                    ]),
            ]);
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
