<?php

namespace App\Filament\Builder\Fields;

use App\Filament\Fields\UrlSelectionField;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\ToggleButtons;

class CardField
{
    public static function make(): Group
    {
        return Group::make()
            ->schema([

            ]);
    }
}
