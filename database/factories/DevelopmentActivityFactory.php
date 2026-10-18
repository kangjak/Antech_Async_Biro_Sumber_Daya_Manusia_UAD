<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

class DevelopmentActivityFactory extends Factory
{
    public function definition(): array
    {
        $employeeId = Employee::query()
            ->inRandomOrder()
            ->value('id');

        $startDate = fake()->dateTimeBetween('-2 years', 'now');

        $start = \Carbon\Carbon::instance($startDate);

        $end = $start->copy()->addDays(
            fake()->numberBetween(1, 180)
        );

        $isCompleted = $end->isPast();

        $activityType = fake()->randomElement([
            'Pelatihan',
            'Studi Lanjut',
            'Sertifikasi',
        ]);

        return [
            'employee_id' => $employeeId,

            'activity_type' => $activityType,

            'title' => match ($activityType) {
                'Pelatihan' => 'Pelatihan ' . fake()->words(3, true),
                'Studi Lanjut' => 'Studi Lanjut ' . fake()->randomElement([
                    'S2',
                    'S3',
                ]),
                'Sertifikasi' => 'Sertifikasi ' . fake()->words(2, true),
            },

            'organizer' => fake()->company(),

            'start_date' => $start->toDateString(),

            'end_date' => $end->toDateString(),

            'status' => $isCompleted ? 'Selesai' : 'Berjalan',

            'degree_level' => $activityType === 'Studi Lanjut'
                ? fake()->randomElement(['S2', 'S3'])
                : null,

            'study_program' => $activityType === 'Studi Lanjut'
                ? fake()->words(2, true)
                : null,

            'expected_end_date' => $activityType === 'Studi Lanjut'
                ? $end->copy()->addYears(2)->toDateString()
                : null,

            'scholarship_name' => $activityType === 'Studi Lanjut'
                ? fake()->company()
                : null,

            'scholarship_status' => $activityType === 'Studi Lanjut'
                ? fake()->randomElement([
                    'Diajukan',
                    'Diterima',
                ])
                : null,

            'mentoring_notes' => fake()->sentence(),

            'training_type' => $activityType === 'Pelatihan'
                ? fake()->randomElement([
                    'Teknis',
                    'Manajerial',
                ])
                : null,

            'duration_hours' => $activityType === 'Pelatihan'
                ? fake()->numberBetween(8, 40)
                : null,

            'certificate_number' => $activityType === 'Sertifikasi'
                ? fake()->unique()->bothify('CERT-########')
                : null,

            'certificate_path' => null,
        ];
    }
}