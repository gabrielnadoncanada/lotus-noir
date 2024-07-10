<?php

namespace App\Filament\Builder\Blocks;

use App\Filament\Builder\Fields\ButtonField;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Repeater;

class ButtonsBlock
{
    public static function make(): Block
    {
        return Block::make('buttons')
            ->schema([
                Repeater::make('buttons')
                    ->schema([
                        ButtonField::make()
                    ]),
            ]);
    }
}
