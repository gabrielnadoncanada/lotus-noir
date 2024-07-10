<?php

namespace App\Filament\Builder\Sections;

use App\Filament\Builder\AbstractSection;
use App\Filament\Builder\Blocks\ButtonBlock;
use App\Filament\Builder\Blocks\HeadingBlock;
use App\Filament\Builder\Blocks\ImageBlock;
use App\Filament\Builder\Blocks\NumberBlock;
use App\Filament\Builder\Blocks\SubtitleBlock;
use App\Filament\Builder\Blocks\TextBlock;
use App\Filament\Builder\Fields\HeadingField;
use App\Filament\Fields\Range;
use App\Filament\Fields\RangeSlider;
use App\Filament\Fields\UrlSelectionField;
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\ToggleButtons;

class MultiColumnSection extends AbstractSection
{
    protected static string $blockName = 'multi_column';

    protected function schema(): array
    {
        return [
            HeadingField::make(),
            Repeater::make('columns')
                ->collapsible()
                ->collapsed()
                ->schema(parent::schema())
                ->defaultItems(3),
        ];
    }

    public function blocks(): array
    {
        return [
            ImageBlock::make()->maxItems(1),
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
            Fieldset::make('image')
                ->schema([
                    ToggleButtons::make('image_width')
                        ->label('Image Width')
                        ->options([
                            'third' => 'One Third',
                            'half' => 'Half',
                            'full' => 'Full',
                        ])
                        ->default('full'),

                    ToggleButtons::make('image_ratio')
                        ->label('Image Ratio')
                        ->options([
                            'adapt' => 'Adapt',
                            'portrait' => 'Portrait',
                            'square' => 'Square',
                            'circle' => 'Circle',
                        ])
                        ->default('adapt'),
                ]),

            Fieldset::make('column')
                ->schema([
                    RangeSlider::make('columns_desktop')
                        ->label('Number of Columns (Desktop)')
                        ->minValue(1)
                        ->maxValue(6)
                        ->step(1)
                        ->default(3),

                    RangeSlider::make('columns_mobile')
                        ->label('Number of Columns (Mobile)')
                        ->minValue(1)
                        ->maxValue(2)
                        ->step(1)
                        ->default(1),

                    ToggleButtons::make('column_alignment')
                        ->label('Column Alignment')
                        ->options([
                            'left' => 'Left',
                            'center' => 'Center',
                        ])
                ]),


            UrlSelectionField::make('button'),


            Toggle::make('swipe_on_mobile')
                ->label('Enable Swipe on Mobile')
                ->default(false),
        ];
    }

    public function preset(): array
    {
        return [
            ['type' => 'image'],
            ['type' => 'number'],
            ['type' => 'subtitle'],
            ['type' => 'heading'],
            ['type' => 'text'],
            ['type' => 'button'],
        ];
    }

    protected function maxItems(): int
    {
        return 6;
    }
}
