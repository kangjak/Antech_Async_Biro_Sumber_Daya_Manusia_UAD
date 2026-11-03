<?php

namespace Database\Factories;

use App\Models\Employee;
use App\Models\RequestType;
use Illuminate\Database\Eloquent\Factories\Factory;
use RuntimeException;

class LeaveBalanceFactory extends Factory
{
    protected static ?array $employeeIds = null;
    protected static ?array $requestTypeIds = null;

    public function definition(): array
    {
        self::$employeeIds ??= Employee::query()->pluck('id')->all();
        self::$requestTypeIds ??= RequestType::query()
            ->where('kind', 'Cuti')
            ->where('is_active', true)
            ->pluck('id')
            ->all();

        if (empty(self::$employeeIds)) {
            throw new RuntimeException(
                'Data Employee belum tersedia. Buat Employee terlebih dahulu.'
            );
        }

        if (empty(self::$requestTypeIds)) {
            throw new RuntimeException(
                'Data RequestType (Cuti) belum tersedia. Buat RequestType terlebih dahulu.'
            );
        }

        $employeeId = fake()->randomElement(self::$employeeIds);
        $requestTypeId = fake()->randomElement(self::$requestTypeIds);

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