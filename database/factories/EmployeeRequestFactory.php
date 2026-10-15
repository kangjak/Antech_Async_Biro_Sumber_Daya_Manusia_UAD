<?php

namespace Database\Factories;

use App\Models\EmployeeRequest;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<EmployeeRequest>
 */
class EmployeeRequestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'request_kind' => 'Cuti',
            'employee_id' => \App\Models\Employee::query()->inRandomOrder()->value('id'),
            'request_type_id' => \App\Models\RequestType::query()->inRandomOrder()->value('id'),
            'start_date' => fake()->dateTimeBetween('now', '+3 months')->format('Y-m-d'),
            'end_date' => fake()->dateTimeBetween('+3 months', '+4 months')->format('Y-m-d'),
            'total_days' => fake()->numberBetween(1, 5),
            'period_label' => (string) now()->year,
            'reason' => fake()->sentence(),
            'status' => 'Menunggu',
            'approver_id' => \App\Models\Employee::query()->inRandomOrder()->value('id'),
            'submitted_at' => now(),
            'version' => 1,
        ];
    }
}
