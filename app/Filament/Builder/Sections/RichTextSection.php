<?php

namespace App\Filament\Builder\Sections;

use App\Filament\Builder\AbstractSection;
use App\Filament\Builder\Blocks\ButtonsBlock;
use App\Filament\Builder\Blocks\HeadingBlock;
use App\Filament\Builder\Blocks\NumberBlock;
use App\Filament\Builder\Blocks\SubtitleBlock;
use App\Filament\Builder\Blocks\TextBlock;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\ToggleButtons;

class RichTextSection extends AbstractSection
{
    protected static string $blockName = 'rich_text';

    public function blocks(): array
    {
        return [
            NumberBlock::make()->maxItems(1),
            SubtitleBlock::make()->maxItems(1),
            HeadingBlock::make()->maxItems(1),
            TextBlock::make()->maxItems(1),
            ButtonsBlock::make()->maxItems(1),
        ];
    }

    public function settings(): array
    {
        return [
            Fieldset::make('content')
                ->schema([
                    ToggleButtons::make('desktop_content_alignment')
                        ->options([
                            'left' => 'Left',
                            'center' => 'Center',
                            'right' => 'Right',
                        ])
                        ->default('center')
                        ->label('Desktop Content Alignment'),

                    ToggleButtons::make('mobile_content_alignment')
                        ->options([
                            'left' => 'Left',
                            'center' => 'Center',
                            'right' => 'Right',
                        ])
                        ->default('center')
                        ->label('Mobile Content Alignment'),
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
            ['type' => 'buttons'],
        ];
    }

    protected function maxItems(): int
    {
        return 5;
    }
}
