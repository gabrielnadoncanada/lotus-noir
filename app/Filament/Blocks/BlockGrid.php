<?php

namespace App\Filament\Blocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ToggleButtons;
use Filament\Forms\Get;

class BlockGrid
{
    public static function make(

    ): Block {
        return Block::make('grid')
            ->schema([
                Group::make()
                    ->schema([
                        Select::make('layout_type')
                            ->label('Layout Type')
                            ->options([
                                'boxed' => 'Boxed Layout',
                                'grid' => 'Grid Layout',
                            ])
                            ->default('boxed')
                            ->disabled(),
                        Select::make('columns')
                            ->label('Columns')
                            ->options([
                                '50' => '2 Columns',
                                '33' => '3 Columns',
                            ])
                            ->default('50'),
                        Select::make('type')
                            ->live()
                            ->options([
                                'dynamic' => 'Dynamic',
                                'static' => 'Static',
                            ])->default('dynamic'),
                    ])->columns(3),
                Group::make()
                    ->schema([
                        Fieldset::make()
                            ->schema([
                                Checkbox::make('show_title')
                                    ->label('Show Title')
                                    ->default(true),
                                Checkbox::make('show_text')
                                    ->label('Show description')
                                    ->default(true),
                                Checkbox::make('show_image')
                                    ->label('Show Image')
                                    ->default(true),
                                Checkbox::make('show_lightbox')
                                    ->label('Show Lightbox')
                                    ->default(true),
                            ]),
                    ])->columns(3),

                Group::make()
                    ->whenTruthy('type')
                    ->schema(fn (Get $get): array => match ($get('type')) {
                        'dynamic' => [
                            Select::make('dynamic_type')
                                ->label('Dynamic Type')
                                ->options([
                                    'App\Models\Blog\Post' => 'blog_posts',
                                    'App\Models\Page' => 'Pages',
                                    'App\Models\Service\Post' => 'service_posts',
                                    'App\Models\Portfolio\Post' => 'portfolio_posts',
                                ])
                                ->live(),
                            Select::make('order_by')
                                ->label('Order By')
                                ->live()
                                ->reactive()
                                ->options([
                                    'created_at' => 'Created At',
                                    'updated_at' => 'Updated At',
                                    'title' => 'Title',
                                    'published_at' => 'Published At',
                                ])
                                ->default('created_at'),
                            Select::make('order_direction')
                                ->label('Order Direction')
                                ->options([
                                    'asc' => 'Ascending',
                                    'desc' => 'Descending',
                                ])
                                ->default('asc'),
                            TextInput::make('limit')
                                ->label('Limit')
                                ->numeric()
                                ->default(10),
                            TextInput::make('per_page')
                                ->label('per page')
                                ->numeric()
                                ->default(10),
                            Select::make('category_ids')
                                ->live()
                                ->multiple()
                                ->preload()
                                ->searchable()
                                ->options(function ($get) {
                                    if (! empty($get('dynamic_type'))) {
                                        $firstItem = app($get('dynamic_type'))->all()->first();

                                        if (method_exists($firstItem, 'categories')) {
                                            return $firstItem->categories()->getRelated()->all()->pluck('title', 'id')->toArray();
                                        }
                                    }

                                    return [];
                                }),
                        ],
                        'static' => [
                            Group::make()
                                ->schema([
                                    TagsInput::make('categories'),
                                ]),
                            Repeater::make('items')
                                ->schema([
                                    TextInput::make('title'),
                                    RichEditor::make('content'),
                                    TextInput::make('image'),
                                    TextInput::make('link'),
                                    ToggleButtons::make('target')
                                        ->options([
                                            '_self' => 'Self',
                                            '_blank' => 'Blank',
                                        ])
                                        ->default('_self'),
                                ]),
                        ],
                        default => [],
                    }),
            ]);
    }
}
