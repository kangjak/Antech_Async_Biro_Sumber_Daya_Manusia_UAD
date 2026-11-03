<?php

namespace Database\Factories;

use App\Models\Employee;
use App\Models\RequestType;
use Illuminate\Database\Eloquent\Factories\Factory;
use RuntimeException;

class EmployeeRequestFactory extends Factory
{
    protected static ?array $employeeIds = null;
    protected static ?array $requestTypes = null;

    public function definition(): array
    {
        self::$employeeIds ??= Employee::query()->pluck('id')->all();
        self::$requestTypes ??= RequestType::query()
            ->where('is_active', true)
            ->get(['id', 'kind'])
            ->toArray();

        if (empty(self::$employeeIds)) {
            throw new RuntimeException(
                'Data Employee belum tersedia. Buat Employee terlebih dahulu.'
            );
        }

        if (empty(self::$requestTypes)) {
            throw new RuntimeException(
                'Data RequestType belum tersedia. Buat RequestType terlebih dahulu.'
            );
        }

        $employeeId = fake()->randomElement(self::$employeeIds);
        $requestType = fake()->randomElement(self::$requestTypes);
        $kind = $requestType['kind'] ?? 'Cuti';

        $startDate = fake()->dateTimeBetween('+1 day', '+3 months');
        $startDate = \Carbon\Carbon::instance($startDate);

        $totalDays = fake()->numberBetween(1, 5);

        $endDate = $startDate->copy()->addDays($totalDays - 1);

        $status = fake()->randomElement([
            'Menunggu',
            'Disetujui',
            'Ditolak',
        ]);

        $approverId = fake()->randomElement(self::$employeeIds);

        return [
            'request_kind' => $kind,
            'employee_id' => $employeeId,
            'request_type_id' => $requestType['id'] ?? null,
            'start_date' => $startDate->toDateString(),
            'end_date' => $endDate->toDateString(),
            'total_days' => $totalDays,
            'work_date' => null,
            'start_time' => null,
            'end_time' => null,
            'total_hours' => null,
            'period_label' => $startDate->format('Y'),
            'amount' => null,
            'reason' => fake()->sentence(),
            'status' => $status,
            'approver_id' => $approverId,
            'submitted_at' => now(),
            'decided_at' => $status === 'Menunggu'
                ? null
                : now(),
            'decision_note' => $status === 'Menunggu'
                ? null
                : fake()->sentence(),
            'version' => 1,
        ];
    }
}