<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    protected $model = Employee::class;

    public function definition(): array
    {
        $id = fake()->unique()->numerify('OBA-EMP-####');

        return [
            'employee_id' => $id,
            'full_name' => fake()->name(),
            'gender' => fake()->randomElement(['male', 'female']),
            'department' => fake()->randomElement(['Planning', 'ICT', 'Crop', 'Livestock']),
            'position' => fake()->jobTitle(),
            'phone' => fake()->phoneNumber(),
            'email' => fake()->safeEmail(),
            'hire_date' => fake()->date(),
        ];
    }
}
