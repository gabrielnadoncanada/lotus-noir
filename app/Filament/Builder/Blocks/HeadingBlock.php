<?php

namespace App\Filament\Builder\Blocks;

use App\Filament\Builder\Fields\HeadingField;
use Filament\Forms\Components\Builder\Block;

class HeadingBlock
{
    public static function make(): Block
    {
        return Block::make('heading')
            ->schema([
                HeadingField::make()
            ]);
    }
}
