<?php

namespace Database\Factories;

use App\Models\Bill;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class BillFactory extends Factory
{
    protected $model = Bill::class;

    public function definition(): array
    {
        $title = fake()->sentence(6);

        return [
            'title' => $title,
            'slug' => Str::slug($title . '-' . fake()->unique()->numberBetween(100, 999)),
            'bill_number' => 'BILL-' . fake()->unique()->numerify('###/2026'),
            'summary' => fake()->sentence(18),
            'content_html' => '<p>' . fake()->paragraph(5) . '</p>',
            'attachments_json' => null,
            'effective_date' => now()->subDays(fake()->numberBetween(1, 120))->toDateString(),
            'status' => 'published',
            'created_by' => null,
        ];
    }
}
