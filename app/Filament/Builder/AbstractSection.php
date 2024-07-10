<?php

namespace App\Filament\Builder;

use Filament\Forms\Components\Builder;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Tabs;

abstract class AbstractSection
{
    protected static string $blockName;

    public static function make(): Block
    {
        $instance = new static();

        return Block::make(static::$blockName)
            ->schema([
                Tabs::make()->tabs([
                    Tabs\Tab::make('Content')
                        ->schema($instance->schema()),
                    Tabs\Tab::make('Settings')
                        ->schema($instance->settings()),
                ]),
            ]);
    }

    protected function schema(): array
    {
        return [
            Builder::make('blocks')
                ->hiddenLabel()
                ->collapsible()
                ->collapsed()
                ->maxItems($this->maxItems())
                ->blocks($this->blocks())
                ->default($this->preset())
                ->collapsible(),
        ];
    }

    abstract protected function blocks(): array;

    abstract protected function settings(): array;

    abstract protected function preset(): array;

    abstract protected function maxItems(): int;
}
