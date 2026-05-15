<?php

namespace Database\Factories;

use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(),
            'text' => $this->faker->paragraph(),
            'content_image' => $this->faker->imageUrl(),
            'published_at' => $this->faker->dateTime(),
            'user_id' => $this->faker->numberBetween(1, 10)
        ];
    }
}
