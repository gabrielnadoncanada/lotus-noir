<?php

namespace App\Filament\Blocks;

use App\Filament\Blocks\Fields\Buttons;
use App\Filament\Blocks\Fields\Heading;
use App\Filament\Blocks\Fields\RichEditor;
use App\Filament\Blocks\Fields\Subtitle;
use App\Filament\Fields\UrlSelectionField;
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;

class Section
{
    public static function make(
        string $name = 'section',
    ): Block {
        return Block::make($name)
            ->schema([
                TextInput::make('section_number')
                    ->default('01'),
                Subtitle::make(),
                Heading::make(),
                RichEditor::make(),
                Buttons::make(),
                Builder::make('blocks')
                    ->collapsible()
                    ->cloneable()
                    ->collapsed()
                    ->blocks([
                        OneColumn::make(),
                        TwoColumn::make(),
                        Slider::make()
                    ])
                    ->collapsible(),
            ]);
    }
}
