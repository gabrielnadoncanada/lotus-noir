<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class ThemeSettings extends Settings
{
    public ?string $site_title;

    public ?string $site_home_page_id;

    public ?string $site_tag_line;

    public ?string $site_fav_icon;

    public ?string $site_logo;

    public ?string $site_country;

    public ?string $site_state;

    public ?string $site_city;

    public ?string $site_address;

    public ?string $site_email;

    public ?string $site_phone;

    public ?string $facebook_url;

    public ?string $instagram_url;


    public static function group(): string
    {
        return 'theme';
    }
}
