<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class UserResource extends Resource
{
    protected static ?string $model = \App\Models\User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';

    protected static ?string $navigationGroup = 'Site';

    protected static ?int $navigationSort = 3;

    public static function getNavigationLabel(): string
    {
        return __('filament.users.title');
    }

    public static function getLabel(): ?string
    {
        return __('filament.users.title');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()
                    ->schema(static::getFormSchema())
                    ->columnSpan(2),
                Forms\Components\Section::make()
                    ->schema([
                        Forms\Components\Placeholder::make('created_at')
                            ->label(__('filament.fields.created_at'))
                            ->content(fn (\App\Models\User $record): ?string => $record->created_at?->diffForHumans())
                            ->hidden(fn (?\App\Models\User $record) => $record === null),
                        Forms\Components\Placeholder::make('updated_at')
                            ->label(__('filament.fields.updated_at'))
                            ->content(fn (\App\Models\User $record): ?string => $record->updated_at?->diffForHumans())
                            ->hidden(fn (?\App\Models\User $record) => $record === null),
                        Forms\Components\Select::make('roles')
                            ->label(__('filament.fields.roles'))
                            ->relationship('roles', 'name')
                            ->multiple()
                            ->preload()
                            ->required(),
                    ])
                    ->columnSpan(['lg' => 1]),
            ])
            ->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label(__('filament.fields.name')),
                Tables\Columns\TextColumn::make('email')
                    ->label(__('filament.fields.email')),
                TextColumn::make('created_at')
                    ->label(__('filament.fields.created_at'))
                    ->date()
                    ->sortable(),
                TextColumn::make('updated_at')
                    ->label(__('filament.fields.updated_at'))
                    ->date()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),

            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
        ];
    }

    public static function getFormSchema(): array
    {
        return [
            Forms\Components\Section::make()
                ->schema([
                    Forms\Components\Grid::make()
                        ->schema(
                            [
                                Forms\Components\TextInput::make('name')
                                    ->label(__('filament.fields.name'))
                                    ->required(),
                                Forms\Components\TextInput::make('email')
                                    ->label(__('filament.fields.email'))
                                    ->email()
                                    ->unique(ignoreRecord: true)
                                    ->required()
                                    ->dehydrated(fn (string $operation): bool => $operation !== 'create')
                                    ->maxLength(255)
                                    ->disabled(fn (string $operation): bool => $operation !== 'create'),
                            ]
                        )->columns(2),
                ]),
            Forms\Components\Section::make('Mot de passe')
                ->collapsible()
                ->collapsed()
                ->schema([
                    Forms\Components\Grid::make()
                        ->schema([
                            Forms\Components\TextInput::make('password')
                                ->label('Nouveau mot de passe')
                                ->password()
                                ->required(fn (?\App\Models\User $record) => $record === null)
                                ->rule(Password::default())
                                ->dehydrated(fn ($state): bool => filled($state))
                                ->live(debounce: 500)
                                ->password()
                                ->afterStateHydrated(function (Forms\Components\TextInput $component, $state) {
                                    $component->state('');
                                })
                                ->dehydrateStateUsing(fn ($state) => Hash::make($state))
                                ->dehydrated(fn ($state) => filled($state))
                                ->required(fn (string $context): bool => $context === 'create')
                                ->same('passwordConfirmation'),
                            Forms\Components\TextInput::make('passwordConfirmation')
                                ->label('Confirmation du mot de passe')
                                ->password()
                                ->required()
                                ->visible(fn (Get $get): bool => filled($get('password')))
                                ->dehydrated(false),
                        ])->columns(2),
                ]),
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => \App\Filament\Resources\UserResource\Pages\ListUsers::route('/'),
            'create' => \App\Filament\Resources\UserResource\Pages\CreateUser::route('/create'),
            'edit' => \App\Filament\Resources\UserResource\Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
