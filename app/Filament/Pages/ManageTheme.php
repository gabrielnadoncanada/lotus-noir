<?php

namespace App\Filament\Pages;

use App\Filament\Fields\PageSelect;
use App\Settings\ThemeSettings;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Pages\SettingsPage;

class ManageTheme extends SettingsPage
{
    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected static string $settings = ThemeSettings::class;

    protected static ?string $navigationGroup = 'Site';

    protected static ?int $navigationSort = 5;

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Tabs::make('Tabs')
                    ->tabs([
                        Tabs\Tab::make('General')
                            ->schema(static::generalTabSchema()),
                    ])
                    ->columnSpanFull(),
            ]);
    }

    public static function generalTabSchema(): array
    {
        return [
            TextInput::make('site_title'),
            PageSelect::make('site_home_page_id')
                ->disabled(),
            FileUpload::make('site_fav_icon')
                ->image(),
            FileUpload::make('site_logo')
                ->image(),
            TextInput::make('instagram_url')
                ->url(),
            TextInput::make('facebook_url')
                ->url(),
            TextInput::make('google_analytics_tracking_id'),
        ];
    }
}
