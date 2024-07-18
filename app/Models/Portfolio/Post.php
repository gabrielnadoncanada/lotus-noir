<?php

namespace App\Models\Portfolio;

use App\Enums\PublishedStatus;
use App\Traits\HasMeta;
use Devlense\FilamentBuilder\Concerns\HasContent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Post extends Model
{
    use HasFactory;
    use HasMeta;
    use HasContent;

    /**
     * @var string
     */
    protected $guarded = [];

    /**
     * @var array<string, string>
     */
    protected $casts = [
        'status' => PublishedStatus::class,
        'gallery' => 'array',
    ];

    protected $table = 'portfolio_posts';

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'portfolio_category_post', 'portfolio_post_id', 'portfolio_category_id');
    }

    public function scopePublished($query)
    {
        return $query->where('is_visible', '!=', false)
            ->where('published_at', '<=', now());
    }

    public function getBasePath(): string
    {
        return '/portfolio/';
    }

    public function getPublicUrl()
    {
        return url()->to($this->getBasePath() . $this->slug . '/');
    }


    public function categoryName()
    {
        if ($this->categories()->exists()) {
            return $this->categories()->first()->name;
        }
        return false;
    }
}
