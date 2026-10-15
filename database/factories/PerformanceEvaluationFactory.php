<?php

namespace Database\Factories;

use App\Models\PerformanceEvaluation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<PerformanceEvaluation>
 */
class PerformanceEvaluationFactory extends Factory
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
            'eval_type' => 'Kinerja Tahunan',
            'period_label' => (string) now()->year,
            'academic_year' => now()->year . '/' . (now()->year + 1),
            'semester' => fake()->randomElement(['Ganjil', 'Genap']),
            'period_start' => now()->startOfYear()->toDateString(),
            'period_end' => now()->endOfYear()->toDateString(),
            'teaching_credit' => fake()->randomFloat(2, 40, 100),
            'research_credit' => fake()->randomFloat(2, 20, 80),
            'service_credit' => fake()->randomFloat(2, 10, 50),
            'support_credit' => fake()->randomFloat(2, 0, 20),
            'total_credit' => fake()->randomFloat(2, 100, 250),
            'reviewer_id' => \App\Models\Employee::query()->inRandomOrder()->value('id'),
            'status' => 'Dinilai',
            'reviewed_at' => now(),
            'final_score' => fake()->randomFloat(2, 60, 100),
            'rating' => fake()->randomElement(['Cukup', 'Baik', 'Sangat Baik']),
            'version' => 1,
            'is_current' => true,
            'revision_reason' => null,
        ];
    }
}
