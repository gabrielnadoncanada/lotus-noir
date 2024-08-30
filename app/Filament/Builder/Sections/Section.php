<?php

namespace App\Filament\Builder\Sections;

use App\Filament\Builder\Blocks\FormBlock;
use Devlense\FilamentBuilder\SectionBuilder;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section as SectionComponent;
use Filament\Forms\Components\TextInput;

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
            FormBlock::make(),
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
