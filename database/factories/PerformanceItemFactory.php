<?php

namespace Database\Factories;

use App\Models\PerformanceEvaluation;
use Illuminate\Database\Eloquent\Factories\Factory;

class PerformanceItemFactory extends Factory
{
    public function definition(): array
    {
        $evaluationId = PerformanceEvaluation::query()
            ->inRandomOrder()
            ->value('id');

        $target = fake()->numberBetween(50, 100);

        $realization = fake()->numberBetween(40, 120);

        // Skor berdasarkan perbandingan realisasi dan target.
        $score = min(100, round(($realization / $target) * 100, 2));

        return [
            'evaluation_id' => $evaluationId,

            'description' => fake()->sentence(),

            'unit' => fake()->randomElement([
                'Persentase',
                'Jumlah',
                'Jam',
            ]),

            'target_value' => $target,

            'realization_value' => $realization,

            'weight' => fake()->numberBetween(5, 30),

            'score' => $score,
        ];
    }
}