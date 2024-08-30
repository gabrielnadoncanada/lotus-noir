<?php

namespace App\Filament\Resources\PageResource\Pages;

use App\Filament\Resources\PageResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;
use Pboivin\FilamentPeek\Pages\Concerns\HasPreviewModal;

class ListPages extends ListRecords
{
    protected static string $resource = PageResource::class;

    protected function getTableQuery(): ?Builder
    {

        return static::getResource()::getEloquentQuery();
    }

}
