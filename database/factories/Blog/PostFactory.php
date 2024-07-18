<?php

namespace Database\Factories\Blog;

use App\Models\Blog\Post;
use Database\Factories\Concerns\CanCreateImages;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    use CanCreateImages;

    protected $model = Post::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'slug' => $this->faker->unique()->slug,
            'text' => $this->faker->sentence,
            'published_at' => now(),
            'is_visible' => true,
            'image' => $this->createImage(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
