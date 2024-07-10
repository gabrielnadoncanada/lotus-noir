<?php

namespace App\Filament\Resources\Service\PostResource\Pages;

use App\Filament\Builder\HasTemplates;
use App\Filament\Resources\Service\PostResource;
use Filament\Resources\Pages\CreateRecord;

class CreatePost extends CreateRecord
{
    use HasTemplates;

    protected static string $resource = PostResource::class;
}
