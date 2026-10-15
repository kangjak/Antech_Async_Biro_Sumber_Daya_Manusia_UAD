<?php

namespace Database\Factories;

use App\Models\WorkSchedule;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<WorkSchedule>
 */
class WorkScheduleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->randomElement([
                'Jadwal Kerja Reguler',
                'Jadwal Kerja Akademik',
            ]),
            'unit_id' => \App\Models\Unit::query()->inRandomOrder()->value('id'),
            'category' => 'Reguler',
            'valid_from' => '2026-01-01',
            'valid_until' => '2026-12-31',
            'is_published' => true,
            'published_at' => now(),
            'created_by' => \App\Models\User::query()->value('id'),
            'first_day' => 'Senin',
            'last_day' => 'Jumat',
            'start_time' => '08:00:00',
            'end_time' => '16:00:00',
        ];
    }
}
