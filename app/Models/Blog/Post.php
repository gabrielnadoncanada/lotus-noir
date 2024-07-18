<?php

namespace App\Models\Blog;

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
    ];

    protected $table = 'blog_posts';

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'blog_category_post', 'blog_post_id', 'blog_category_id');
    }

    public function scopePublished($query)
    {
        return $query->where('is_visible', '!=', false)
            ->where('published_at', '<=', now());
    }

    public function getBasePath(): string
    {
        return '/blogue/';
    }

    public function getPublicUrl()
    {
        return url()->to($this->getBasePath() . $this->slug . '/');
    }
}
