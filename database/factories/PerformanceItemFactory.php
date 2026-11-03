<?php

namespace Database\Factories;

use App\Models\PerformanceEvaluation;
use Illuminate\Database\Eloquent\Factories\Factory;
use RuntimeException;

class PerformanceItemFactory extends Factory
{
    protected static ?array $evaluationIds = null;

    public function definition(): array
    {
        self::$evaluationIds ??= PerformanceEvaluation::query()->pluck('id')->all();

        if (empty(self::$evaluationIds)) {
            throw new RuntimeException(
                'Data PerformanceEvaluation belum tersedia. Buat PerformanceEvaluation terlebih dahulu.'
            );
        }

        $evaluationId = fake()->randomElement(self::$evaluationIds);

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