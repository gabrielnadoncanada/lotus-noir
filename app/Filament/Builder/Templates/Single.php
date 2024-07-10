<?php

namespace App\Filament\Builder\Templates;

use App\Filament\Blocks\BlockSection;
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

final class Single
{
    public static function title()
    {
        return 'Single';
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
                Actions::make([
                    InlinePreviewAction::make()
                        ->label('Open Content Editor')
                        ->builderName('content')
                ])
                ->columnSpanFull()
                ->alignEnd(),
            Section::make('Content')
                ->collapsible()
                ->schema([
                    Builder::make('content_section')
                        ->hiddenLabel()
                        ->addActionLabel('Ajouter au contenu')
                        ->collapsible()
                        ->collapsed()
                        ->blocks([
                            ImageWithTextSection::make(''),
                            RichTextSection::make(),
                            MultiColumnSection::make(),
                            MultiRowSection::make(),
                            ImageBannerSection::make(),
                            SlideshowSection::make()

                        ]),
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
}
