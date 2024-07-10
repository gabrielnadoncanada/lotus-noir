<?php

namespace App\Filament\Builder\Blocks;

use App\Filament\Builder\Fields\ImageField;
use Filament\Forms\Components\Builder\Block;

class ImageBlock
{
    public static function make(): Block
    {
        return Block::make('image')
            ->schema([
                ImageField::make()
            ]);
    }
}
