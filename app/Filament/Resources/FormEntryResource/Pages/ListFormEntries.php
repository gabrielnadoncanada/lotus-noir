<?php

namespace App\Filament\Resources\FormEntryResource\Pages;

use App\Filament\Resources\FormEntryResource;
use Filament\Resources\Pages\ListRecords;

class ListFormEntries extends ListRecords
{
    protected static string $resource = FormEntryResource::class;
}
