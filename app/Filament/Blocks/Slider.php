<?php

namespace App\Filament\Blocks;

use App\Filament\Blocks\Fields\Buttons;
use App\Filament\Blocks\Fields\RichEditor;
use App\Filament\Blocks\Fields\Heading;
use App\Filament\Blocks\Fields\Image;
use App\Filament\Blocks\Fields\Subtitle;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Group;
use Filament\Forms\Get;

class Slider
{
    public static function make(
        string $name = 'slider',
    ): ConfigurableBlock
    {
        return ConfigurableBlock::make($name)
            ->schema([
                Tabs::make()->tabs([
                    Tabs\Tab::make('Slides')
                        ->schema([
                            Repeater::make('slides')
                                ->label('Slides')
                                ->collapsible()
                                ->cloneable()
                                ->collapsed()
                                ->addActionLabel('Add Slide')
                                ->reorderableWithButtons()
                                ->columnSpanFull()
                                ->schema([
                                    Subtitle::make(),
                                    Heading::make(),
                                    RichEditor::make(),
                                    Image::make(),
                                    Buttons::make(),
                                ]),
                        ]),
                    Tabs\Tab::make('Configuration')
                        ->schema([
                            Select::make('template')
                                ->options([
                                    'full-screen' => 'Full Screen',
                                    'horizontal-1' => 'Horizontal 1',
                                ])
                                ->default('full-screen')

                                ->live(),

                            Group::make()
                                ->statePath('options')
                                ->schema([
                                    TextInput::make('slidesPerView')->numeric(),

                                    Group::make()
                                        ->statePath('pagination')
                                        ->schema([
                                            Toggle::make('enabled')
                                                ->label('Activate pagination')
                                                ->live()
                                                ->default(true),
//                                            Fieldset::make('pagination')
//                                                ->statePath('pagination')
//                                                ->schema([
////                                                    Select::make('type')
////                                                        ->options([
////                                                            'progress' => 'Progress',
////                                                        ])
////                                                        ->default('progress'),
//                                                    Toggle::make('clickable')
//                                                        ->label('Clickable')
//                                                        ->default(true),
//                                                ])
//                                                ->hidden(fn($get) => !$get('enabled')),
                                        ]),
                                    Group::make()
                                        ->statePath('autoplay')
                                        ->schema([
                                            Toggle::make('enabled')
                                                ->label('Activate autoplay')
                                                ->live()
                                                ->default(true),
                                            Fieldset::make('autoplay')
                                                ->schema([
                                                    TextInput::make('delay')
                                                        ->label('Delay')
                                                        ->default(10000)
                                                        ->numeric()
                                                    ,
                                                    Toggle::make('disableOnInteraction')
                                                        ->label('Disable on Interaction')
                                                        ->default(true),
                                                ])
                                                ->hidden(fn($get) => !$get('enabled')),
                                        ]),
                                    Group::make()
                                        ->statePath('navigation')
                                        ->schema([
                                            Toggle::make('enabled')
                                                ->label('Activate navigation')
                                                ->live()
                                                ->default(true),
//                                            Fieldset::make('autoplay')
//                                                ->schema([
//                                                    TextInput::make('delay')
//                                                        ->label('Delay')
//                                                        ->default(10000)
//                                                        ->numeric()
//                                                    ,
//                                                    Toggle::make('disableOnInteraction')
//                                                        ->label('Disable on Interaction')
//                                                        ->default(false),
//                                                ])
//                                                ->hidden(fn($get) => !$get('enabled')),
                                        ]),

                                    Toggle::make('loop')
                                        ->label('Loop')
                                        ->default(true),
                                    Toggle::make('parallax')
                                        ->label('Parallax')
                                        ->default(true),
                                    Toggle::make('mousewheel')
                                        ->label('Mousewheel Control')
                                        ->default(true),
                                    Toggle::make('keyboard')
                                        ->label('Keyboard Control')
                                        ->default(true),
                                    TextInput::make('speed')
                                        ->label('Transition Speed')
                                        ->default(1200)
                                        ->numeric()
                                        ->minValue(100)
                                        ->step(100)
                                ])
                        ])
                ]),
            ]);
    }
}
