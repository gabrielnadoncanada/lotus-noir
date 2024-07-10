<?php

namespace App\Filament\Builder\Sections;

use App\Filament\Builder\AbstractSection;
use App\Filament\Builder\Blocks\ButtonsBlock;
use App\Filament\Builder\Blocks\HeadingBlock;
use App\Filament\Builder\Blocks\NumberBlock;
use App\Filament\Builder\Blocks\SubtitleBlock;
use App\Filament\Builder\Blocks\TextBlock;
use App\Filament\Builder\Fields\HeadingField;
use App\Filament\Fields\RangeSlider;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\ToggleButtons;

class SlideshowSection extends AbstractSection
{
    protected static string $blockName = 'slideshow';

    public function schema(): array
    {
        $parentSchema = parent::schema();

        return [
            $parentSchema[0]->cloneable()
        ];
    }

    public function blocks(): array
    {
        return [
            ImageBannerSection::make()
        ];
    }

    public function settings(): array
    {
        $template = 'horizontal-1';
        $defaultOptions = self::setDefaultOptionsByTemplate($template);
        return [
            Toggle::make('fullWidth')
                ->label('Full Width')
                ->hidden()
                ->default($defaultOptions['fullWidth']),
            Select::make('template')
                ->options([
                    'full-screen' => 'Full Screen',
                    'horizontal-1' => 'Horizontal 1',
                ])
                ->default($template)
                ->hidden()
                ->live(),
            Group::make()
                ->statePath('options')
                ->schema([
                    TextInput::make('slidesPerView')
                        ->default($defaultOptions['slidesPerView'])
                        ->hidden()
                        ->numeric(),
                    TextInput::make('slidesPerView')
                        ->statePath('breakpoints.768.slidesPerView')
                        ->label('slidesPerView mobile')

                        ->numeric()
                        ->default($defaultOptions['mobileSlidesPerView']),
                    TextInput::make('spaceBetween')
                        ->numeric()
                        ->hidden()
                        ->default(30),
                    Group::make()
                        ->statePath('pagination')
                        ->schema([
                            Toggle::make('enabled')
                                ->label('Activate pagination')
                                ->live()
                                ->default(true),
                        ]),
                    Group::make()
                        ->statePath('autoplay')
                        ->schema([
                            Toggle::make('enabled')
                                ->label('Activate autoplay')
                                ->live()
                                ->default(true),
                            Fieldset::make('autoplay')
                                ->hidden()
                                ->schema([
                                    TextInput::make('delay')
                                        ->label('Delay')
                                        ->default(10000)
                                        ->numeric(),
                                    Toggle::make('disableOnInteraction')
                                        ->label('Disable on Interaction')
                                        ->default(true),
                                ]),

                        ]),
                    Group::make()
                        ->statePath('navigation')
                        ->schema([
                            Toggle::make('enabled')
                                ->label('Activate navigation')
                                ->live()
                                ->default(true),

                        ]),
                    Toggle::make('loop')
                        ->label('Loop')
                        ->default(true),
                    Toggle::make('parallax')
                        ->label('Parallax')
                        ->hidden()
                        ->default($defaultOptions['parallax']),
                    Toggle::make('mousewheel')
                        ->label('Mousewheel Control')
                        ->hidden()
                        ->default(false),
                    Toggle::make('keyboard')
                        ->label('Keyboard Control')
                        ->default(true),
                    TextInput::make('speed')
                        ->label('Transition Speed')
                        ->default(1200)
                        ->numeric()
                        ->hidden()
                        ->minValue(100)
                        ->step(100),
                ]),
        ];
    }

    public static function setDefaultOptionsByTemplate($template = 'horizontal-1'): array
    {
        return match ($template) {
            'horizontal-1' => [
                'slidesPerView' => 1,
                'mobileSlidesPerView' => 3,
                'heading_level' => 'h3',
                'heading_size' => 'h2',
                'fullWidth' => false,
                'parallax' => false,
            ],
            'full-screen' => [
                'slidesPerView' => 1,
                'mobileSlidesPerView' => 1,
                'heading_level' => 'h2',
                'heading_size' => 'h2',
                'fullWidth' => false,
                'parallax' => true,
            ]
        };
    }

    public function preset(): array
    {
        return [

        ];
    }

    protected function maxItems(): int
    {
        return 10;
    }
}
