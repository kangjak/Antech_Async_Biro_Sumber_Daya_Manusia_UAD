<?php

namespace Database\Factories;

use App\Models\Employee;
use App\Models\RequestType;
use Illuminate\Database\Eloquent\Factories\Factory;

class LeaveBalanceFactory extends Factory
{
    public function definition(): array
    {
        $employeeId = Employee::query()->inRandomOrder()->value('id');

        $requestTypeId = RequestType::query()
            ->where('kind', 'Cuti')
            ->where('is_active', true)
            ->inRandomOrder()
            ->value('id');

        $quota = fake()->numberBetween(8, 15);
        $used = fake()->numberBetween(0, $quota);

        return [
            'employee_id' => $employeeId,
            'request_type_id' => $requestTypeId,
            'year' => now()->year,
            'quota_days' => $quota,
            'used_days' => $used,
            'version' => 1,
        ];
    }
}