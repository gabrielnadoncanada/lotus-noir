<?php

namespace App\Filament\Resources\Portfolio\PostResource\Pages;

use App\Filament\Builder\HasTemplates;
use App\Filament\Resources\Portfolio\PostResource;
use Filament\Resources\Pages\CreateRecord;

class CreatePost extends CreateRecord
{
    use HasTemplates;

    protected static string $resource = PostResource::class;
}
