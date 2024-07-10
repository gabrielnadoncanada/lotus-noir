<?php

namespace App\Filament\Builder\Sections;

use App\Filament\Builder\AbstractSection;
use App\Filament\Builder\Blocks\ButtonsBlock;
use App\Filament\Builder\Blocks\HeadingBlock;
use App\Filament\Builder\Blocks\NumberBlock;
use App\Filament\Builder\Blocks\SubtitleBlock;
use App\Filament\Builder\Blocks\TextBlock;
use App\Filament\Fields\RangeSlider;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\ToggleButtons;

class ImageBannerSection extends AbstractSection
{
    protected static string $blockName = 'image_banner';

    public function blocks(): array
    {
        return [
            NumberBlock::make()->maxItems(1),
            SubtitleBlock::make()->maxItems(1),
            HeadingBlock::make(
                defaultHeadingLevel: $this->parameters['heading_level'],
                defaultHeadingSize: $this->parameters['heading_size'],
            )->maxItems(1),
            TextBlock::make()->maxItems(1),
            ButtonsBlock::make()->maxItems(1),
        ];
    }

    public function defaultParameters(): array
    {
        return [
            'heading_level' => 'h2',
            'heading_size' => 'h2',
            'template' => 'horizontal-1',
        ];
    }
    public function settings(): array
    {
        return [
            FileUpload::make('mobile_image')
                ->image()
                ->label('Mobile Image'),
            FileUpload::make('desktop_image')
                ->image()
                ->label('Desktop Image'),
            Fieldset::make('image')
                ->schema([
                    RangeSlider::make('image_overlay_opacity')
                        ->minValue(0)
                        ->maxValue(100)
                        ->step(10)
                        ->columnSpanFull()
                        ->label('Image Overlay Opacity')
                        ->default(0),
                    Select::make('desktop_image_position')
                        ->options([
                            'top-left' => 'Top Left',
                            'top-center' => 'Top Center',
                            'top-right' => 'Top Right',
                            'middle-left' => 'Middle Left',
                            'middle-center' => 'Middle Center',
                            'middle-right' => 'Middle Right',
                            'bottom-left' => 'Bottom Left',
                            'bottom-center' => 'Bottom Center',
                            'bottom-right' => 'Bottom Right',
                        ])
                        ->default('middle-center')
                        ->label('Desktop Image Position'),
                    Select::make('mobile_image_position')
                        ->options([
                            'top-left' => 'Top Left',
                            'top-center' => 'Top Center',
                            'top-right' => 'Top Right',
                            'middle-left' => 'Middle Left',
                            'middle-center' => 'Middle Center',
                            'middle-right' => 'Middle Right',
                            'bottom-left' => 'Bottom Left',
                            'bottom-center' => 'Bottom Center',
                            'bottom-right' => 'Bottom Right',
                        ])
                        ->default('middle-center')
                        ->label('Mobile Image Position'),
                    Select::make('image_height')
                        ->options([
                            'adapt' => 'Adapt to Image',
                            'small' => 'Small',
                            'medium' => 'Medium',
                            'large' => 'Large',
                            'screen' => 'Screen Height',
                        ])
                        ->default('medium')
                        ->label('Image Height'),


                ]),
            Fieldset::make('content')
                ->schema([
                    Select::make('desktop_content_position')
                        ->options([
                            'top-left' => 'Top Left',
                            'top-center' => 'Top Center',
                            'top-right' => 'Top Right',
                            'middle-left' => 'Middle Left',
                            'middle-center' => 'Middle Center',
                            'middle-right' => 'Middle Right',
                            'bottom-left' => 'Bottom Left',
                            'bottom-center' => 'Bottom Center',
                            'bottom-right' => 'Bottom Right',
                        ])
                        ->default('middle-center')
                        ->label('Desktop Content Position'),
                    Select::make('desktop_content_alignment')
                        ->options([
                            'left' => 'Left',
                            'center' => 'Center',
                            'right' => 'Right',
                        ])
                        ->default('center')
                        ->label('Desktop Content Alignment'),
                    Select::make('mobile_content_alignment')
                        ->options([
                            'left' => 'Left',
                            'center' => 'Center',
                            'right' => 'Right',
                        ])
                        ->default('center')
                        ->label('Mobile Content Alignment'),
                    Toggle::make('show_text_box_desktop')
                        ->default(true)
                        ->label('Show Text Box Desktop'),
                ]),
            ToggleButtons::make('mobile_layout')
                ->options([
                    'image-first' => 'Image First',
                    'text-first' => 'Text First',
                ])
                ->default('image-first')
                ->label('Mobile Layout'),
        ];
    }

    public function preset(): array
    {
        return [
            ['type' => 'number'],
            ['type' => 'subtitle'],
            ['type' => 'heading'],
            ['type' => 'text'],
            ['type' => 'buttons'],
        ];
    }

    protected function maxItems(): int
    {
        return 5;
    }
}
