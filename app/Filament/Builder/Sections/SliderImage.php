<?php

namespace App\Filament\Builder\Sections;

use Devlense\FilamentBuilder\SectionBuilder;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;

class SliderImage extends SectionBuilder
{
    protected static string $name = 'slider_image';

    public static function make($parameters = []): Block
    {
        static::$parameters = $parameters;

        return Block::make(static::$name)
            ->schema([
                Repeater::make('items')
                    ->label('Items')
                    ->collapsible()
                    ->collapsed()
                    ->cloneable()
                    ->schema([
                        FileUpload::make('image')
                            ->required()
                            ->image()
                            ->maxFiles(1),

                    ])
                    ->defaultItems(3),
            ]);
    }

    public static function defaultParameters(): array
    {
        return [

        ];
    }

    public static function blocks($parameters): array
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
