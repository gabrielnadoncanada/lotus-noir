<?php

namespace App\Filament\Resources\Portfolio\PostResource\Pages;

use App\Filament\Builder\HasTemplates;
use App\Filament\Resources\Portfolio\PostResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Pboivin\FilamentPeek\Pages\Actions\PreviewAction;

class EditPost extends EditRecord
{
    use HasPostPreview;
    use HasTemplates;

    protected static string $resource = PostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            PreviewAction::make()->label('Preview Changes'),
        ];
    }
}
