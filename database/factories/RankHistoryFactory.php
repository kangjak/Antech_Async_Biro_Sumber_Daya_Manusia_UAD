<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;
use RuntimeException;

class RankHistoryFactory extends Factory
{
    protected static ?array $dosenIds = null;
    protected static ?array $allEmployeeIds = null;

    public function definition(): array
    {
        self::$dosenIds ??= Employee::query()
            ->where('category', 'Dosen')
            ->pluck('id')
            ->all();

        self::$allEmployeeIds ??= Employee::query()->pluck('id')->all();

        if (empty(self::$dosenIds)) {
            throw new RuntimeException(
                'Data Employee dengan kategori Dosen belum tersedia. Buat Employee Dosen terlebih dahulu.'
            );
        }

        $employeeId = fake()->randomElement(self::$dosenIds);
        $approverId = fake()->randomElement(self::$allEmployeeIds);

        $submittedAt = fake()->dateTimeBetween('-2 years', '-2 months');
        $decidedAt = fake()->dateTimeBetween($submittedAt, 'now');

        $rank = fake()->randomElement([
            'Asisten Ahli',
            'Lektor',
        ]);

        return [
            'employee_id' => $employeeId,

            'rank_name' => $rank,

            'credit_points' => fake()->numberBetween(100, 300),

            'is_accelerated' => false,

            'status' => 'Disetujui',

            'submitted_at' => $submittedAt,

            'approver_id' => $approverId,

            'decided_at' => $decidedAt,

            'effective_date' => fake()->dateTimeBetween(
                $decidedAt,
                'now'
            ),

            'sk_number' => fake()->unique()->bothify('SK-####-####'),

            'sk_date' => $decidedAt,

            'decision_note' => fake()->sentence(),

            'rank_grade' => fake()->randomElement([
                'III/a',
                'III/b',
                'III/c',
            ]),

            'functional_position' => 'Dosen',
        ];
    }
}