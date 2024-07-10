<?php

namespace App\Filament\Resources;

use App\Filament\Builder\HasTemplates;
use App\Filament\Fields\IsVisible;
use App\Filament\Fields\Meta;
use App\Filament\Fields\TitleWithSlugInput;
use App\Filament\Resources\PageResource\Pages;
use App\Models\Page;
use App\Traits\HasMeta;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Pboivin\FilamentPeek\Tables\Actions\ListPreviewAction;

class PageResource extends Resource
{
    use HasTemplates;

    protected static ?string $model = Page::class;

    protected static ?string $navigationGroup = 'Site';

    protected static ?int $navigationSort = 1;

    protected static bool $shouldRegisterNavigation = true;

    protected static ?string $recordTitleAttribute = 'title';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        $record = $form->getRecord();
        if ($record) {
            static::$templateModel = $record->template();
        }

        return $form
            ->schema([
                Group::make()
                    ->schema([
                        Group::make()
                            ->schema([
                                Tabs::make('Tabs')
                                    ->tabs([
                                        Tabs\Tab::make('General')
                                            ->schema([
                                                TitleWithSlugInput::make(
                                                    fieldTitle: 'title',
                                                    fieldSlug: 'slug',
                                                )->label('Title'),
                                                Textarea::make('text')
                                                    ->rows(3)
                                                    ->required(),
                                                FileUpload::make('image')
                                                    ->label('Image')
                                                    ->image(),
                                            ])->afterStateUpdated(function ($get, $state, $set) {
                                                if (class_has_trait(static::$model, HasMeta::class)) {
                                                    if (empty($get('meta.title')) && ! empty($state['title'])) {
                                                        $set('meta.title', $state['title']);
                                                    }
                                                    if (empty($get('meta.text')) && ! empty($state['text'])) {
                                                        $set('meta.text', $state['text']);
                                                    }
                                                    if (empty($get('meta.image')) && ! empty($state['image'])) {
                                                        $set('meta.image', $state['image']);
                                                    }
                                                }
                                            })->live(),
                                        Tabs\Tab::make('SEO')
                                            ->schema([
                                                Meta::make(),
                                            ]),
                                    ]),
                            ])
                            ->columnSpan(['lg' => 2]),
                        Group::make()
                            ->schema([
                                Section::make('Status')
                                    ->schema([
                                        Toggle::make('is_visible')
                                            ->label('Visible')
                                            ->default(true),
                                        DatePicker::make('published_at')
                                            ->label('Publish Date')
                                            ->default(now())
                                            ->required(),
                                    ]),
                            ])
                            ->columnSpan(['lg' => 1]),
                    ])->columns(3),
                ...self::getTemplateSchemas(),
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')
                    ->label('Image'),
                TextColumn::make('title'),
                IsVisible::make('is_visible'),
            ])
            ->filters([])
            ->actions([
                ActionGroup::make([
                    ListPreviewAction::make(),
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                ]),
            ])
            ->groupedBulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);

    }

    public static function getRelations(): array
    {
        return [
            // Define your relations here
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPages::route('/'),
            'create' => Pages\CreatePage::route('/create'),
            'edit' => Pages\EditPage::route('/{record}/edit'),
        ];
    }
}
