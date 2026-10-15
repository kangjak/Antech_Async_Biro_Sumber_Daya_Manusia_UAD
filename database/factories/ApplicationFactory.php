<?php

namespace Database\Factories;

use App\Models\Application;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Application>
 */
class ApplicationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'vacancy_id' => \App\Models\Vacancy::query()->inRandomOrder()->value('id'),
            'employee_id' => null,
            'applicant_name' => fake()->name(),
            'applicant_email' => fake()->unique()->safeEmail(),
            'applicant_phone' => fake()->phoneNumber(),
            'birth_date' => fake()->date(),
            'highest_education' => fake()->randomElement(['S1', 'S2', 'S3']),
            'cv_path' => null,
            'applied_at' => fake()->dateTimeBetween('-1 year', 'now'),
            'aik_score' => fake()->randomFloat(2, 60, 100),
            'current_stage' => 'Seleksi Administrasi',
            'stage_result' => 'Menunggu',
            'stage_score' => null,
            'stage_assessed_by' => \App\Models\User::query()->value('id'),
            'stage_assessed_at' => null,
            'stage_notes' => null,
            'status' => 'Diproses',
            'decided_at' => null,
        ];
    }
}
