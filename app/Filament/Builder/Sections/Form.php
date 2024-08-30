<?php

namespace App\Filament\Builder\Sections;

use App\Filament\Builder\Blocks\FormBlock;
use Devlense\FilamentBuilder\SectionBuilder;

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
            FormBlock::make(),
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
