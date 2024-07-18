<?php

namespace App\Filament\Builder\Blocks;

use App\Filament\Builder\Fields\ButtonField;
use Devlense\FilamentBuilder\BlockBuilder;
use Filament\Forms\Components\Repeater;

class FormBlock extends BlockBuilder
{
    protected static string $name = 'form';

    public static function getSchema($parameters): array
    {
        return [

        ];
    }
}
