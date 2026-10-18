<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Vacancy;
use Illuminate\Database\Eloquent\Factories\Factory;
use RuntimeException;

/**
 * @extends Factory<\App\Models\Application>
 */
class ApplicationFactory extends Factory
{
    protected static ?array $vacancyIds = null;
    protected static ?array $userIds = null;

    public function definition(): array
    {
        // Ambil ID lowongan dan user sekali, lalu gunakan kembali.
        self::$vacancyIds ??= Vacancy::query()->pluck('id')->all();
        self::$userIds ??= User::query()->pluck('id')->all();

        if (empty(self::$vacancyIds)) {
            throw new RuntimeException(
                'Data Vacancy belum tersedia. Buat data Vacancy terlebih dahulu.'
            );
        }

        if (empty(self::$userIds)) {
            throw new RuntimeException(
                'Data User belum tersedia. Buat data User terlebih dahulu.'
            );
        }

        $status = fake()->randomElement([
            'Diproses',
            'Diproses',
            'Diproses',
            'Diterima',
            'Ditolak',
        ]);

        $isDecided = in_array($status, ['Diterima', 'Ditolak'], true);

        return [
            'vacancy_id' => fake()->randomElement(self::$vacancyIds),
            'employee_id' => null,

            'applicant_name' => fake()->name(),
            'applicant_email' => fake()->unique()->safeEmail(),
            'applicant_phone' => fake()->numerify('08##########'),

            'birth_date' => fake()->dateTimeBetween(
                '-45 years',
                '-18 years'
            )->format('Y-m-d'),

            'highest_education' => fake()->randomElement([
                'S1',
                'S2',
                'S3',
            ]),

            'cv_path' => null,
            'applied_at' => fake()->dateTimeBetween(
                '-1 year',
                'now'
            ),

            'aik_score' => fake()->randomFloat(2, 60, 100),

            'current_stage' => $isDecided
                ? 'Seleksi Akhir'
                : 'Seleksi Administrasi',

            'stage_result' => $isDecided
                ? $status
                : 'Menunggu',

            'stage_score' => $isDecided
                ? fake()->randomFloat(2, 60, 100)
                : null,

            'stage_assessed_by' => fake()->randomElement(self::$userIds),

            'stage_assessed_at' => $isDecided
                ? fake()->dateTimeBetween('-6 months', 'now')
                : null,

            'stage_notes' => $isDecided
                ? fake()->sentence()
                : null,

            'status' => $status,

            'decided_at' => $isDecided
                ? fake()->dateTimeBetween('-6 months', 'now')
                : null,
        ];
    }
}