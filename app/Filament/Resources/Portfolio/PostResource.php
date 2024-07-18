<?php

namespace App\Filament\Resources\Portfolio;

use App\Filament\Fields\IsVisible;
use App\Filament\Fields\Meta;
use App\Filament\Resources\PageResource;
use App\Filament\Resources\Portfolio\PostResource\Pages;
use App\Models\Portfolio\Post;
use Filament\Actions\ReplicateAction;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Pboivin\FilamentPeek\Tables\Actions\ListPreviewAction;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $slug = 'portfolio/posts';

    protected static ?string $navigationGroup = 'Portfolio';

    protected static ?string $recordTitleAttribute = 'title';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Group::make()
                ->schema([
                    Group::make()
                        ->schema([
                            Tabs::make('Tabs')
                                ->tabs([
                                    Tabs\Tab::make('General')
                                        ->schema(PageResource::getGeneralSchema()),
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
                            Section::make('Associations')
                                ->schema([
                                    Select::make('categories')
                                        ->multiple()
                                        ->relationship('categories', 'title')
                                        ->searchable()
                                        ->preload()
                                        ->createOptionForm(CategoryResource::getGeneralSchema()),
                                ]),
                        ])
                        ->columnSpan(['lg' => 1]),
                ])->columns(3),
            //            ...self::getTemplateSchemas(),
        ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')
                    ->label('Image'),
                TextColumn::make('title')
                    ->searchable()
                    ->sortable(),
                IsVisible::make('is_visible'),
            ])
            ->filters([])
            ->actions([
                ActionGroup::make([
                    ListPreviewAction::make(),
                    ReplicateAction::make(),
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
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}
