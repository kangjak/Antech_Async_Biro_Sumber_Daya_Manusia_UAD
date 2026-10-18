<?php

namespace Database\Factories;

use App\Models\Unit;
use App\Models\User;
use App\Models\Vacancy;
use Illuminate\Database\Eloquent\Factories\Factory;
use RuntimeException;

/**
 * @extends Factory<Vacancy>
 */
class VacancyFactory extends Factory
{
    protected static ?array $unitIds = null;
    protected static ?array $userIds = null;

    public function definition(): array
    {
        // Ambil ID sekali, kemudian gunakan kembali.
        self::$unitIds ??= Unit::query()->pluck('id')->all();
        self::$userIds ??= User::query()->pluck('id')->all();

        if (empty(self::$unitIds) || empty(self::$userIds)) {
            throw new RuntimeException(
                'Data Unit dan User harus tersedia sebelum membuat Vacancy.'
            );
        }

        $openDate = fake()->dateTimeBetween(
            '-6 months',
            'now'
        );

        $closeDate = fake()->dateTimeBetween(
            $openDate,
            '+6 months'
        );

        return [
            'unit_id' => fake()->randomElement(self::$unitIds),

            'title' => fake()->jobTitle(),

            'category' => fake()->randomElement([
                'Dosen',
                'Tenaga Kependidikan',
            ]),

            'description' => fake()->paragraph(),

            'min_qualification' => fake()->randomElement([
                'S1',
                'S2',
                'S3',
            ]),

            'quota' => fake()->numberBetween(1, 5),

            'open_date' => $openDate->format('Y-m-d'),

            'close_date' => $closeDate->format('Y-m-d'),

            'status' => 'Dibuka',

            'created_by' => fake()->randomElement(self::$userIds),
        ];
    }
}