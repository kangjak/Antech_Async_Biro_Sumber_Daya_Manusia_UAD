<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;
use RuntimeException;

class PerformanceEvaluationFactory extends Factory
{
    protected static ?array $employeeIds = null;

    public function definition(): array
    {
        self::$employeeIds ??= Employee::query()->pluck('id')->all();

        if (empty(self::$employeeIds)) {
            throw new RuntimeException(
                'Data Employee belum tersedia. Buat Employee terlebih dahulu.'
            );
        }

        $employeeId = fake()->randomElement(self::$employeeIds);

        // Komponen kredit
        $teachingCredit = fake()->numberBetween(40, 100);
        $researchCredit = fake()->numberBetween(20, 80);
        $serviceCredit = fake()->numberBetween(10, 50);
        $supportCredit = fake()->numberBetween(0, 20);

        // Total kredit dihitung dari semua komponen
        $totalCredit = $teachingCredit
            + $researchCredit
            + $serviceCredit
            + $supportCredit;

        // Periode evaluasi
        $year = fake()->numberBetween(
            now()->year - 3,
            now()->year
        );

        $semester = fake()->randomElement([
            'Ganjil',
            'Genap',
        ]);

        if ($semester === 'Ganjil') {
            $periodStart = "{$year}-08-01";
            $periodEnd = ($year + 1) . '-01-31';
        } else {
            $periodStart = ($year + 1) . '-02-01';
            $periodEnd = ($year + 1) . '-07-31';
        }

        $finalScore = fake()->randomFloat(2, 60, 100);

        if ($finalScore >= 85) {
            $rating = 'Sangat Baik';
        } elseif ($finalScore >= 70) {
            $rating = 'Baik';
        } else {
            $rating = 'Cukup';
        }

        $reviewerId = fake()->randomElement(self::$employeeIds);

        return [
            'employee_id' => $employeeId,
            'eval_type' => 'Kinerja Tahunan',
            'period_label' => (string) $year,
            'academic_year' => $year . '/' . ($year + 1),
            'semester' => $semester,
            'period_start' => $periodStart,
            'period_end' => $periodEnd,
            'teaching_credit' => $teachingCredit,
            'research_credit' => $researchCredit,
            'service_credit' => $serviceCredit,
            'support_credit' => $supportCredit,
            'total_credit' => $totalCredit,
            'reviewer_id' => $reviewerId,
            'status' => 'Dinilai',
            'reviewed_at' => now(),
            'final_score' => $finalScore,
            'rating' => $rating,
            'version' => 1,
            'is_current' => true,
            'revision_reason' => null,
        ];
    }
}