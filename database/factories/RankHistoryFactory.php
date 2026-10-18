<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

class RankHistoryFactory extends Factory
{
    public function definition(): array
    {
        $employee = Employee::query()
            ->where('category', 'Dosen')
            ->inRandomOrder()
            ->first();

        $approverId = null;

        if ($employee) {
            $approverId = Employee::query()
                ->where('id', '!=', $employee->id)
                ->inRandomOrder()
                ->value('id');
        }

        $submittedAt = fake()->dateTimeBetween('-2 years', '-2 months');
        $decidedAt = fake()->dateTimeBetween($submittedAt, 'now');

        $rank = fake()->randomElement([
            'Asisten Ahli',
            'Lektor',
        ]);

        return [
            'employee_id' => $employee?->id,

            'rank_name' => $rank,

            'credit_points' => fake()->numberBetween(100, 300),

            'is_accelerated' => false,

            'status' => 'Disetujui',

            'submitted_at' => $submittedAt,

            'approver_id' => $approverId,

            'decided_at' => $decidedAt,

            'effective_date' => fake()->dateTimeBetween(
                $decidedAt,
                'now'
            ),

            'sk_number' => fake()->unique()->bothify('SK-####-####'),

            'sk_date' => $decidedAt,

            'decision_note' => fake()->sentence(),

            'rank_grade' => fake()->randomElement([
                'III/a',
                'III/b',
                'III/c',
            ]),

            'functional_position' => 'Dosen',
        ];
    }
}