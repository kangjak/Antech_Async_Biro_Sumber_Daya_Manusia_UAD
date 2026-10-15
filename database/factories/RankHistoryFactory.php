<?php

namespace Database\Factories;

use App\Models\RankHistory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<RankHistory>
 */
class RankHistoryFactory extends Factory
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
            'rank_name' => fake()->randomElement(['Asisten Ahli', 'Lektor']),
            'credit_points' => fake()->randomFloat(2, 100, 300),
            'is_accelerated' => false,
            'status' => 'Disetujui',
            'submitted_at' => now()->subMonths(2),
            'approver_id' => \App\Models\Employee::query()->inRandomOrder()->value('id'),
            'decided_at' => now()->subMonth(),
            'effective_date' => now()->startOfYear()->toDateString(),
            'sk_number' => fake()->unique()->numerify('SK-####-####'),
            'sk_date' => now()->subMonth()->toDateString(),
            'decision_note' => fake()->sentence(),
            'rank_grade' => fake()->randomElement(['III/a', 'III/b', 'III/c']),
            'functional_position' => 'Dosen',
        ];
    }
}
