<?php

namespace Database\Factories;

use App\Models\NewsArticle;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class NewsArticleFactory extends Factory
{
    protected $model = NewsArticle::class;

    public function definition(): array
    {
        $title = fake()->sentence(7);

        return [
            'title' => $title,
            'slug' => Str::slug($title . '-' . fake()->unique()->numberBetween(100, 999)),
            'summary' => fake()->sentence(20),
            'content_html' => '<p>' . fake()->paragraph(8) . '</p>',
            'category_id' => null,
            'tags_json' => ['agriculture', fake()->word()],
            'author_id' => null,
            'publish_at' => now()->subDays(fake()->numberBetween(1, 60)),
            'status' => 'published',
        ];
    }
}
