<?php

namespace Database\Factories\Service;

use App\Models\Service\Category;
use Database\Factories\Concerns\CanCreateImages;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    use CanCreateImages;

    protected $model = Category::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->word,
            'slug' => $this->faker->unique()->slug,
            'description' => $this->faker->optional()->sentence,
            'image' => $this->createImage(),
            'is_visible' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
