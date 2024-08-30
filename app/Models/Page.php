<?php

namespace App\Models;

use App\Enums\PublishedStatus;
use App\Filament\Builder\Templates\Archive;
use App\Filament\Builder\Templates\Home;
use App\Filament\Builder\Templates\Single;
use App\Settings\ThemeSettings;
use App\Traits\HasMeta;
use Devlense\FilamentBuilder\Concerns\HasContent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasContent;
    use HasFactory;
    use HasMeta;

    const ID = 'id';

    const TITLE = 'title';

    const SLUG = 'slug';

    const TEXT = 'text';

    const IS_VISIBLE = 'is_visible';

    const PUBLISHED_AT = 'published_at';

    const IMAGE = 'image';

    const CREATED_AT = 'created_at';

    const UPDATED_AT = 'updated_at';

    protected $guarded = [];

    protected $casts = [
        'status' => PublishedStatus::class,
    ];

    public function scopePublished($query)
    {
        return $query->where('is_visible', '!=', false)
            ->where('published_at', '<=', now());
    }

    public function getRouteKeyName(): string
    {
        return filament()->isServing() ? 'id' : 'slug->' . app()->getLocale();
    }

    public function getBasePath(): string
    {
        return '/';
    }

    public function getPublicUrl()
    {
        return url()->to($this->getBasePath() . $this->slug . '/');
    }

    public function isHomePage(): bool
    {
        return theme('site_home_page_id') == $this->id;
    }



    public function template(): string
    {
        if ($this->isHomePage()) {
            return Home::class;
        }

        if ($this->isArchivePage()) {
            return Archive::class;
        }

        return Single::class;
    }
}
