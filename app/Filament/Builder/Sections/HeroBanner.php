<?php

namespace App\Filament\Builder\Sections;

use App\Filament\Builder\Blocks\ButtonsBlock;
use App\Filament\Builder\Blocks\HeadingBlock;
use App\Filament\Builder\Blocks\NumberBlock;
use App\Filament\Builder\Blocks\SubtitleBlock;
use App\Filament\Builder\Blocks\TextBlock;
use App\Filament\Builder\Fields\ButtonField;
use App\Filament\Builder\Fields\HeadingField;
use App\Filament\Builder\Fields\ImageField;
use App\Filament\Builder\Fields\SubtitleField;
use App\Filament\Builder\Fields\TextField;
use Devlense\FilamentBuilder\SectionBuilder;
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ToggleButtons;

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
                ->rows(5)
                ->required(),
                ImageField::make()
                ->required(),
            ])
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
