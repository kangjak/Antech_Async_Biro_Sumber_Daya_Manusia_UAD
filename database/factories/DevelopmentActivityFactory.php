<?php

namespace Database\Factories;

use App\Models\DevelopmentActivity;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<DevelopmentActivity>
 */
class DevelopmentActivityFactory extends Factory
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
            'activity_type' => fake()->randomElement(['Pelatihan', 'Studi Lanjut', 'Sertifikasi']),
            'title' => fake()->sentence(4),
            'organizer' => fake()->company(),
            'start_date' => fake()->dateTimeBetween('-2 years', 'now')->format('Y-m-d'),
            'end_date' => fake()->dateTimeBetween('-1 year', '+1 month')->format('Y-m-d'),
            'status' => fake()->randomElement(['Berjalan', 'Selesai']),
            'degree_level' => fake()->randomElement(['S2', 'S3']),
            'study_program' => fake()->randomElement(['Manajemen', 'Informatika', 'Pendidikan']),
            'expected_end_date' => fake()->dateTimeBetween('now', '+3 years')->format('Y-m-d'),
            'scholarship_name' => fake()->company(),
            'scholarship_status' => fake()->randomElement(['Diajukan', 'Diterima']),
            'mentoring_notes' => fake()->sentence(),
            'training_type' => fake()->randomElement(['Teknis', 'Manajerial']),
            'duration_hours' => fake()->numberBetween(8, 40),
            'certificate_number' => fake()->unique()->bothify('CERT-####-####'),
            'certificate_path' => null,
        ];
    }
}
