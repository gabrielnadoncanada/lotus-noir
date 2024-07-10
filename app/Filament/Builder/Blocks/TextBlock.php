<?php

namespace App\Filament\Builder\Blocks;

use App\Filament\Builder\Fields\TextField;
use Filament\Forms\Components\Builder\Block;

class TextBlock
{
    public static function make(): Block
    {
        return Block::make('text')
            ->schema([
                TextField::make()
            ]);
    }
}
