<?php

namespace Devlense\FilamentBuilder\Concerns;


use App\Filament\Builder\Templates\Single;
use Illuminate\Database\Eloquent\Relations\MorphOne;

trait HasContent
{
    public function template(): string
    {
        return Single::class;
    }

    public function builder(): MorphOne
    {
        return $this->morphOne(config('filament-builder.content_model', Devlense\FilamentBuilder\Models\Content::class), 'contentable');
    }
}
