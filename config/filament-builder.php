<?php

use App\Filament\Builder\Sections\FeaturedCollection;
use App\Filament\Builder\Sections\HeroBanner;
use App\Filament\Builder\Sections\ImageBanner;
use App\Filament\Builder\Sections\ImageWithText;
use App\Filament\Builder\Sections\MultiColumn;
use App\Filament\Builder\Sections\MultiRow;
use App\Filament\Builder\Sections\RichText;
use App\Filament\Builder\Sections\Section;
use App\Filament\Builder\Sections\Slideshow;

return [
    'templates' => [
        'namespace' => 'App\\Filament\\Builder\\Templates',
        'path' => app_path('Filament/Builder/Templates'),
        'register' => [
            //
        ],
    ],

    'sections' => [
        'namespace' => 'App\\Filament\\Builder\\Sections',
        'path' => app_path('Filament/Builder/Sections'),
        'register' => [
            //
        ],
    ],

    'blocks' => [
        'namespace' => 'App\\Filament\\Builder\\Blocks',
        'path' => app_path('Filament/Builder/Blocks'),
        'register' => [
            //
        ],
        'default' => [

            HeroBanner::make(),
            Section::make(),


        ],
    ],
];
