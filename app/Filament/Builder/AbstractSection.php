<?php

namespace App\Filament\Builder;

use Closure;
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Tabs;

abstract class AbstractSection
{
    protected static string $blockName;

    public array $parameters;
    private array $defaultParameters;

    public static function make($parameters = []): Block
    {
        $instance = new static();

        $instance->setDefaultParameters();
        $instance->setParameters($parameters);

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

    abstract protected function blocks(): Closure | array;

    abstract protected function settings(): array;

    abstract protected function preset(): array;

    abstract protected function maxItems(): int;

    abstract protected function defaultParameters(): array;

    public function setParameters($parameters): void
    {
        $this->parameters = array_merge($this->defaultParameters, $parameters);
    }

    public function setDefaultParameters(): void
    {
        $this->defaultParameters = $this->defaultParameters();
    }
}
