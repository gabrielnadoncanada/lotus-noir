<?php

namespace Devlense\FilamentBuilder;

use App\Filament\Builder\Sections\FeaturedCollection;
use App\Filament\Builder\Sections\ImageBanner;
use App\Filament\Builder\Sections\ImageWithText;
use App\Filament\Builder\Sections\MultiColumn;
use App\Filament\Builder\Sections\MultiRow;
use App\Filament\Builder\Sections\RichText;
use App\Filament\Builder\Sections\Slideshow;
use Closure;
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;

abstract class TemplateBuilder
{
    protected static ?string $component;

    protected static ?string $name;

    public static function getName(): string
    {
        return static::$name;
    }

    public static function getComponent(): string
    {
        if (isset(static::$component)) {
            return static::$component;
        }

        return 'filament-builder.layouts.' . static::getName();
    }

    public static function schema(): array
    {
        return static::getDefaultTemplateSections();
    }

    protected static function createTemplateSection(string $title, ?array $sections = null, ?Closure $modifySection = null, ?Closure $modifyBuilder = null): Section
    {
        if (!$sections) {
            $sections = static::getDefaultSections();
        }

        $builder = Builder::make(strtolower($title) . '_section')
            ->hiddenLabel()
            ->blocks($sections);

        if ($modifyBuilder) {
            $modifyBuilder($builder);
        }

        $section = Section::make($title)
            ->schema([$builder]);

        if ($modifySection) {
            $modifySection($section);
        }

        return $section;
    }


    protected static function getDefaultTemplateSections(): array
    {
        return config('filament-builder.templates.sections.default', [
            static::createTemplateSection('Header'),
            static::createTemplateSection('Content'),
            static::createTemplateSection('Footer'),
        ]);
    }

    protected static function getDefaultSections(): array
    {
        return config('filament-builder.blocks.default', []);
    }
}
