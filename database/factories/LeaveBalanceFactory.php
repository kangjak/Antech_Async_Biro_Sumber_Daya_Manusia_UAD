<?php

namespace Database\Factories;

use App\Models\LeaveBalance;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<LeaveBalance>
 */
class LeaveBalanceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'employee_id' => \App\Models\Employee::query()->inRandomOrder()->value('id'),
            'request_type_id' => \App\Models\RequestType::query()->inRandomOrder()->value('id'),
            'year' => now()->year,
            'quota_days' => fake()->numberBetween(8, 15),
            'used_days' => fake()->numberBetween(0, 5),
            'version' => 1,
        ];
    }
}
