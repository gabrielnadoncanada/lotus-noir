<?php

use App\Filament\Builder\Sections\HeroBanner;
use App\Filament\Builder\Sections\Section;

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
