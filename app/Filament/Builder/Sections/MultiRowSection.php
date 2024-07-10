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
use App\Filament\Builder\Fields\ImageField;
use App\Filament\Fields\UrlSelectionField;
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\ToggleButtons;

class MultiRowSection extends AbstractSection
{
    protected static string $blockName = 'multi_row';

    protected function schema(): array
    {
        $schema = parent::schema();

        return [
            Repeater::make('rows')
                ->collapsible()
                ->collapsed()
                ->schema([ImageField::make(), ...$schema])
                ->defaultItems(3),
        ];
    }

    public function defaultParameters(): array
    {
        return [

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
                        ->label('Image Width')
                        ->options([
                            'small' => 'Small',
                            'medium' => 'Medium',
                            'large' => 'Large',
                        ])
                        ->default('medium'),
                    ToggleButtons::make('desktop_image_alignment')
                        ->label('Desktop Image Alignment')
                        ->options([
                            'alternate_left' => 'Alternate from left',
                            'alternate_right' => 'Alternate from right',
                            'left' => 'Aligned left',
                            'right' => 'Aligned right',
                        ])
                        ->columnSpanFull()
                        ->default('alternate_left'),
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
