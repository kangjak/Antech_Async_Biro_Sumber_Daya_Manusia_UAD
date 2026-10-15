<?php

namespace Database\Factories;

use App\Models\Vacancy;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Vacancy>
 */
class VacancyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'unit_id' => \App\Models\Unit::query()->inRandomOrder()->value('id'),
            'title' => fake()->jobTitle(),
            'category' => fake()->randomElement(['Dosen', 'Tenaga Kependidikan']),
            'description' => fake()->paragraph(),
            'min_qualification' => fake()->randomElement(['S1', 'S2', 'S3']),
            'quota' => fake()->numberBetween(1, 5),
            'open_date' => fake()->dateTimeBetween('-6 months', 'now')->format('Y-m-d'),
            'close_date' => fake()->dateTimeBetween('now', '+6 months')->format('Y-m-d'),
            'status' => 'Dibuka',
            'created_by' => \App\Models\User::query()->value('id'),
        ];
    }
}
