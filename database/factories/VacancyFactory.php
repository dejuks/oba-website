<?php

namespace Database\Factories;

use App\Models\Vacancy;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class VacancyFactory extends Factory
{
    protected $model = Vacancy::class;

    public function definition(): array
    {
        $title = fake()->jobTitle();

        return [
            'title' => $title,
            'slug' => Str::slug($title . '-' . fake()->unique()->numberBetween(100, 999)),
            'department' => fake()->randomElement(['Crop', 'Livestock', 'Extension', 'Irrigation']),
            'location' => fake()->city(),
            'type' => fake()->randomElement(['full-time', 'contract', 'internship']),
            'description_html' => '<p>' . fake()->paragraph(4) . '</p>',
            'requirements' => fake()->sentence(12),
            'attachments_json' => null,
            'application_url' => fake()->url(),
            'status' => 'published',
            'publish_at' => now()->subDays(fake()->numberBetween(1, 20)),
            'expire_at' => now()->addDays(fake()->numberBetween(7, 30)),
            'created_by' => null,
        ];
    }
}
