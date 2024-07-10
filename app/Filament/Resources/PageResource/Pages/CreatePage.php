<?php

namespace App\Filament\Resources\PageResource\Pages;

use App\Filament\Builder\HasTemplates;
use App\Filament\Resources\PageResource;
use Filament\Resources\Pages\CreateRecord;

class CreatePage extends CreateRecord
{
    use HasTemplates;

    protected static string $resource = PageResource::class;
}
