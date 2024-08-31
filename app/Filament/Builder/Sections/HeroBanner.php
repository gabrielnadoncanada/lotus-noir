<?php

namespace App\Filament\Builder\Sections;

use App\Filament\Builder\Fields\ImageField;
use Devlense\FilamentBuilder\SectionBuilder;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Textarea;

class HeroBanner extends SectionBuilder
{
    protected static string $name = 'hero_banner';

    public static function blocks($parameters): array
    {
        return [
        ];
    }

    protected static function content($parameters): array
    {
        return [
            Group::make([
                Textarea::make('title')
                    ->label('Titre')
                    ->rows(5)
                    ->required(),
                ImageField::make()
                    ->required(),
            ]),
        ];
    }

    public static function defaultParameters(): array
    {
        return [

        ];
    }

    public static function settings($parameters): array
    {
        return [

        ];
    }

    public static function preset(): array
    {
        return [

        ];
    }

    protected static function maxItems(): int
    {

    }
}
