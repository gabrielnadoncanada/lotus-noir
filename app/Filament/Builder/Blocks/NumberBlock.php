<?php

namespace App\Filament\Builder\Blocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\TextInput;

class NumberBlock
{
    public static function make(): Block
    {
        return Block::make('number')
            ->schema([
                TextInput::make('number')
                ->default('01')
            ]);
    }
}
