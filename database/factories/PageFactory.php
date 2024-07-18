<?php

namespace Database\Factories;

use Database\Factories\Concerns\CanCreateImages;
use Illuminate\Database\Eloquent\Factories\Factory;

class PageFactory extends Factory
{
    use CanCreateImages;

    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'slug' => $this->faker->unique()->slug,
            'text' => $this->faker->sentence,
            'is_visible' => true,
            'published_at' => now(),
            'image' => $this->createImage(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
