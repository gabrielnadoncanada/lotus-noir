<?php

namespace App\Models\Portfolio;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'portfolio_categories';

    public function posts()
    {
        return $this->belongsToMany(Post::class, 'portfolio_category_post');
    }
}
