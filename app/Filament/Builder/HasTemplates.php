<?php

namespace App\Filament\Builder;

use App\Filament\Builder\Templates\Single;
use Filament\Forms\Components\Group;

trait HasTemplates
{
    public static ?string $templateModel = Single::class;

    public static function getTemplateSchemas(): array
    {
        return [
            Group::make(static::$templateModel::schema())
                ->columnSpanFull()
                ->afterStateHydrated(fn ($component, $state) => $component->getChildComponentContainer()->fill($state))
                ->statePath('content'),
        ];
    }
}
