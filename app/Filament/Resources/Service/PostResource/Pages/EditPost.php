<?php

namespace App\Filament\Resources\Service\PostResource\Pages;

use App\Filament\Resources\Service\PostResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Pboivin\FilamentPeek\Pages\Actions\PreviewAction;

class EditPost extends EditRecord
{
    use HasPostPreview;

    protected static string $resource = PostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            PreviewAction::make()->label('Preview Changes'),
        ];
    }
}
