<?php

namespace Database\Factories;

use App\Models\PerformanceItem;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<PerformanceItem>
 */
class PerformanceItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'evaluation_id' => \App\Models\PerformanceEvaluation::query()->inRandomOrder()->value('id'),
            'description' => fake()->sentence(),
            'unit' => fake()->randomElement(['Persentase', 'Jumlah', 'Jam']),
            'target_value' => fake()->randomFloat(2, 50, 100),
            'realization_value' => fake()->randomFloat(2, 40, 100),
            'weight' => fake()->randomFloat(2, 5, 30),
            'score' => fake()->randomFloat(2, 60, 100),
        ];
    }
}
