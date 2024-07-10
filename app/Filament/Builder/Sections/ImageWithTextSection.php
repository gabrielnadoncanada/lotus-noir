<?php

namespace App\Filament\Builder\Sections;

use App\Filament\Builder\AbstractSection;
use App\Filament\Builder\Blocks\ButtonBlock;
use App\Filament\Builder\Blocks\HeadingBlock;
use App\Filament\Builder\Blocks\NumberBlock;
use App\Filament\Builder\Blocks\SubtitleBlock;
use App\Filament\Builder\Blocks\TextBlock;
use App\Filament\Builder\Fields\HeadingField;
use App\Filament\Builder\Fields\ImageField;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\ToggleButtons;

class ImageWithTextSection extends AbstractSection
{
    protected static string $blockName = 'image_with_text';

    protected function schema(): array
    {

        return [
            ImageField::make(),
            ...parent::schema()
        ];
    }

    public function blocks(): array
    {
        return [
            NumberBlock::make()->maxItems(1),
            SubtitleBlock::make()->maxItems(1),
            HeadingBlock::make()->maxItems(1),
            TextBlock::make()->maxItems(1),
            ButtonBlock::make()->maxItems(1),
        ];
    }

    public function settings(): array
    {
        return [
            ToggleButtons::make('layout')
                ->options([
                    'image-first' => 'Image First',
                    'text-first' => 'Text First',
                ])
                ->default('image-first')
                ->label('Layout'),
            Fieldset::make('image')
                ->schema([
                    ToggleButtons::make('desktop_image_height')
                        ->options([
                            'adapt' => 'Adapt',
                            'small' => 'Small',
                            'medium' => 'Medium',
                            'large' => 'Large',
                        ])
                        ->default('adapt')
                        ->label('Desktop Image Height'),

                    ToggleButtons::make('desktop_image_width')
                        ->options([
                            'small' => 'Small',
                            'medium' => 'Medium',
                            'large' => 'Large',
                        ])
                        ->default('medium')
                        ->label('Desktop Image Width')

                ]),
            Fieldset::make('content')
                ->schema([
                    ToggleButtons::make('desktop_content_alignment')
                        ->options([
                            'left' => 'Left',
                            'center' => 'Center',
                            'right' => 'Right',
                        ])
                        ->default('left')
                        ->label('Desktop Content Alignment'),

                    ToggleButtons::make('mobile_content_alignment')
                        ->options([
                            'left' => 'Left',
                            'center' => 'Center',
                            'right' => 'Right',
                        ])
                        ->default('left')
                        ->label('Mobile Content Alignment'),

                    ToggleButtons::make('desktop_content_position')
                        ->options([
                            'top' => 'Top',
                            'middle' => 'Middle',
                            'bottom' => 'Bottom',
                        ])
                        ->default('middle')
                        ->label('Desktop Content Position'),
                ]),
        ];
    }

    public function preset(): array
    {
        return [
            ['type' => 'number'],
            ['type' => 'subtitle'],
            ['type' => 'heading'],
            ['type' => 'text'],
            ['type' => 'button'],
        ];
    }

    protected function maxItems(): int
    {
        return 5;
    }
}
