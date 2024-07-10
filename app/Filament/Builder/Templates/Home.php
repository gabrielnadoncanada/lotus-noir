<?php

namespace App\Filament\Builder\Templates;

use App\Filament\Builder\Sections\ImageBannerSection;
use App\Filament\Builder\Sections\ImageWithTextSection;
use App\Filament\Builder\Sections\MultiColumnSection;
use App\Filament\Builder\Sections\MultiRowSection;
use App\Filament\Builder\Sections\RichTextSection;
use App\Filament\Builder\Sections\SlideshowSection;
use Filament\Forms\Components\Actions;
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\Section;
use Pboivin\FilamentPeek\Forms\Actions\InlinePreviewAction;

final class Home
{
    public static function title()
    {
        return 'Home';
    }

    public static function schema(): array
    {

        return [
            Section::make('Header')
                ->collapsible()
                ->collapsed()
                ->schema([
                    Builder::make('header_section')
                        ->blocks([

                        ])
                        ->maxItems(1)
                        ->reorderable(false)

                ]),

            Section::make('Content')
                ->headerActions([
                    InlinePreviewAction::make()
                        ->label('Open Content Editor')
                        ->builderName('content_section')
                ])
                ->collapsible()
                ->schema([
                    Builder::make('content_section')
                        ->hiddenLabel()
                        ->addActionLabel('Ajouter au contenu')
                        ->collapsible()
                        ->collapsed()
                        ->blocks(Home::contentSectionBlocks()),
                ]),
            Section::make('Footer')
                ->collapsible()
                ->collapsed()
                ->schema([
                    Builder::make('footer_section')
                        ->blocks([
                        ])
                        ->maxItems(1)
                        ->maxItems(1)
                        ->reorderable(false)

                ]),
        ];
    }

    public static function contentSectionBlocks(): array
    {
        return [
            ImageWithTextSection::make(),
            RichTextSection::make(),
            MultiColumnSection::make(),
            MultiRowSection::make(),
            ImageBannerSection::make(),
            SlideshowSection::make()
        ];
    }
}
