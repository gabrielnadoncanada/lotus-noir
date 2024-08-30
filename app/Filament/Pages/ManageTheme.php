<?php

namespace App\Filament\Pages;

use App\Filament\Fields\MenuSelect;
use App\Filament\Fields\PageSelect;
use App\Settings\ThemeSettings;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Textarea;
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
            TextInput::make('site_title')
                ->label('Site Title'),
            TextInput::make('site_tag_line')
                ->label('Tag Line'),
            PageSelect::make('site_home_page_id')
                ->disabled()
                ->label('Home Post'),
            FileUpload::make('site_fav_icon')
                ->image()
                ->label('Site Favicon'),
            FileUpload::make('site_logo')
                ->image()
                ->label('Site logo'),
            TextInput::make('instagram_url')
                ->url(),
            TextInput::make('facebook_url')
                ->url(),
        ];
    }

    public static function headerTabSchema(): array
    {
        return [
            MenuSelect::make('header_menu_id'),
        ];
    }

    public static function footerTabSchema(): array
    {
        return [
            MenuSelect::make('footer_menu_id'),
        ];
    }
}
