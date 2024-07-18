<?php

namespace App\Filament\Builder\Sections;

use App\Filament\Builder\Blocks\ButtonBlock;
use App\Filament\Builder\Blocks\FormBlock;
use App\Filament\Builder\Blocks\HeadingBlock;
use App\Filament\Builder\Blocks\ImageBlock;
use App\Filament\Builder\Blocks\NumberBlock;
use App\Filament\Builder\Blocks\SubtitleBlock;
use App\Filament\Builder\Blocks\TextBlock;
use App\Filament\Builder\Fields\HeadingField;
use App\Filament\Builder\Fields\ImageField;
use App\Filament\Fields\RangeSlider;
use App\Filament\Fields\UrlSelectionField;
use Devlense\FilamentBuilder\SectionBuilder;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section as SectionComponent;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\ToggleButtons;

class Form extends SectionBuilder
{
    protected static string $name = 'form';

    public static function defaultParameters(): array
    {
        return [

        ];
    }

    public static function blocks($parameters): array
    {
        return [
            FormBlock::make()
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
