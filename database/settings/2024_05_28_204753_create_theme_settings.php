<?php

use Illuminate\Support\Facades\Storage;
use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('theme.site_title', 'Vilaplex');
        $this->migrator->add('theme.site_home_page_id', 1);
        $this->migrator->add('theme.site_tag_line', 'Lorem Ipsum Dolor Sit');
        $this->migrator->add('theme.site_fav_icon', Storage::disk('public')->putFile(public_path(config('seeding.favicon_placeholder_path'))));
        $this->migrator->add('theme.site_logo', Storage::disk('public')->putFile(public_path(config('seeding.logo_placeholder_path'))));
        $this->migrator->add('theme.site_country', 'Canada');
        $this->migrator->add('theme.site_state', 'Québec');
        $this->migrator->add('theme.site_city', 'Toronto');
        $this->migrator->add('theme.site_address', '1234 Street Name');
        $this->migrator->add('theme.site_email', 'mireya.inbox@mail.com');
        $this->migrator->add('theme.site_phone', '+4 9(054) 996 84 25');
        $this->migrator->add('theme.facebook_url', '');
        $this->migrator->add('theme.instagram_url', '');
        $this->migrator->add('theme.google_analytics_tracking_id', '');

    }
};
