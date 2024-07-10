<?php

namespace App\Filament\Builder\Blocks;

use App\Filament\Builder\Fields\SubtitleField;
use Filament\Forms\Components\Builder\Block;

class SubtitleBlock
{
    public static function make(): Block
    {
        return Block::make('subtitle')
            ->schema([
                SubtitleField::make()
            ]);
    }
}
