<?php

namespace Database\Factories;

use App\Models\Employee;
use App\Models\RequestType;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeRequestFactory extends Factory
{
    public function definition(): array
    {
        $employeeId = Employee::query()
            ->inRandomOrder()
            ->value('id');

        $requestType = RequestType::query()
            ->where('is_active', true)
            ->inRandomOrder()
            ->first();

        $kind = $requestType?->kind ?? 'Cuti';

        $startDate = fake()->dateTimeBetween('+1 day', '+3 months');
        $startDate = \Carbon\Carbon::instance($startDate);

        $totalDays = fake()->numberBetween(1, 5);

        $endDate = $startDate->copy()->addDays($totalDays - 1);

        $status = fake()->randomElement([
            'Menunggu',
            'Disetujui',
            'Ditolak',
        ]);

        $employee = Employee::find($employeeId);

        $approverId = $employee?->supervisor_id;

        if (!$approverId && $employeeId) {
            $approverId = Employee::query()
                ->where('id', '!=', $employeeId)
                ->inRandomOrder()
                ->value('id');
        }

        return [
            'request_kind' => $kind,
            'employee_id' => $employeeId,
            'request_type_id' => $requestType?->id,
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