<?php

namespace App\Filament\Builder\Blocks;

use App\Filament\Builder\Fields\ButtonField;
use Filament\Forms\Components\Builder\Block;

class ButtonBlock
{
    public static function make(): Block
    {
        return Block::make('button')
            ->schema([
                ButtonField::make(),
            ]);
    }
}
