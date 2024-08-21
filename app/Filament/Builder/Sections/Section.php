<?php

namespace App\Filament\Builder\Sections;

use App\Filament\Builder\Blocks\ButtonsBlock;
use App\Filament\Builder\Blocks\CardsBlock;
use App\Filament\Builder\Blocks\FormBlock;
use App\Filament\Builder\Blocks\HeadingBlock;
use App\Filament\Builder\Blocks\NumberBlock;
use App\Filament\Builder\Blocks\BuilderBlock;
use App\Filament\Builder\Blocks\SectionTitleBlock;
use App\Filament\Builder\Blocks\SubtitleBlock;
use App\Filament\Builder\Blocks\TextBlock;
use App\Filament\Builder\Fields\ButtonField;
use App\Filament\Builder\Fields\HeadingField;
use App\Filament\Builder\Fields\ImageField;
use App\Filament\Builder\Fields\SubtitleField;
use App\Filament\Builder\Fields\TextField;
use App\Filament\Fields\UrlSelectionField;
use Devlense\FilamentBuilder\SectionBuilder;
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section as SectionComponent;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\ToggleButtons;

class Section extends SectionBuilder
{
    protected static string $name = 'section';


    protected static function content($parameters): array
    {
        $schema = parent::content($parameters);

        return [
            Group::make([
                TextInput::make('subtitle'),
                TextInput::make('title'),
                RichEditor::make('description')
                    ->toolbarButtons([
                        'blockquote',
                        'bold',
                        'bulletList',
                        'italic',
                        'link',
                        'orderedList',
                        'redo',
                        'strike',
                        'underline',
                        'undo',
                    ])
                    ->columnSpanFull(),
            ])->columns(),
            SectionComponent::make('Blocks')
                ->schema($schema),

        ];
    }

    public static function blocks($parameters): array
    {
        return [
            SliderImage::make(),
            SliderText::make(),
            FormBlock::make()
        ];
    }

    public static function defaultParameters(): array
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
        return 5;
    }
}
