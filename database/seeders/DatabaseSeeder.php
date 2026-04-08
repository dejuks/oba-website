<?php

namespace Database\Seeders;

use App\Models\Bill;
use App\Models\Employee;
use App\Models\NewsArticle;
use App\Models\Vacancy;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Vacancy::factory()->count(6)->create();
        Bill::factory()->count(6)->create();
        NewsArticle::factory()->count(6)->create();
        Employee::factory()->count(20)->create();
    }
}
