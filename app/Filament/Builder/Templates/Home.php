<?php

namespace App\Filament\Builder\Templates;

use App\Filament\Builder\Sections\Slideshow;
use Devlense\FilamentBuilder\TemplateBuilder;
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\Section;

final class Home extends TemplateBuilder
{
    protected static ?string $name = 'home';

    public static function schema(): array
    {
        return [

            Home::createTemplateSection('Content', modifyBuilder: function (Builder $builder) {
                $builder->collapsible()->collapsed();
            }),
        ];
    }
}
