<?php

namespace Database\Factories;

use App\Models\Unit;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use RuntimeException;

/**
 * @extends Factory<\App\Models\WorkSchedule>
 */
class WorkScheduleFactory extends Factory
{
    protected static ?array $unitIds = null;
    protected static ?array $userIds = null;

    public function definition(): array
    {
        self::$unitIds ??= Unit::query()->pluck('id')->all();
        self::$userIds ??= User::query()->pluck('id')->all();

        if (empty(self::$unitIds)) {
            throw new RuntimeException(
                'Data Unit belum tersedia. Buat Unit terlebih dahulu.'
            );
        }

        if (empty(self::$userIds)) {
            throw new RuntimeException(
                'Data User belum tersedia. Buat User terlebih dahulu.'
            );
        }

        $validFrom = fake()->dateTimeBetween('-1 year', 'now');
        $validUntil = (clone $validFrom)->modify('+1 year');

        return [
            'name' => fake()->randomElement([
                'Jadwal Kerja Reguler',
                'Jadwal Kerja Fleksibel',
                'Jadwal Kerja Administrasi',
                'Jadwal Kerja Akademik',
                'Jadwal Kerja Shift',
            ]),

            'unit_id' => fake()->randomElement(self::$unitIds),

            'category' => 'Reguler',

            'valid_from' => $validFrom->format('Y-m-d'),

            'valid_until' => $validUntil->format('Y-m-d'),

            'is_published' => true,

            'published_at' => now(),

            'created_by' => fake()->randomElement(self::$userIds),

            'first_day' => 'Monday',

            'last_day' => 'Friday',

            'start_time' => '08:00:00',

            'end_time' => '16:00:00',
        ];
    }
}