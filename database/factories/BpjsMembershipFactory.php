<?php

namespace Database\Factories;

use App\Models\BpjsMembership;
use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;
use RuntimeException;

/**
 * @extends Factory<BpjsMembership>
 */
class BpjsMembershipFactory extends Factory
{
    protected static ?array $employeeIds = null;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        self::$employeeIds ??= Employee::query()->pluck('id')->all();

        if (empty(self::$employeeIds)) {
            throw new RuntimeException(
                'Data Employee belum tersedia. Buat Employee terlebih dahulu.'
            );
        }

        $employeeId = fake()->randomElement(self::$employeeIds);

    $bpjsType = fake()->randomElement([
        'Kesehatan',
        'Ketenagakerjaan',
    ]);

    $registeredDate = fake()->dateTimeBetween(
        '-5 years',
        'now'
    );

    return [
        'employee_id' => $employeeId,

        'bpjs_type' => $bpjsType,

        'membership_number' => fake()->unique()->numerify('############'),

        'registered_date' => $registeredDate,

        'status' => 'Aktif',

        'end_date' => null,

        'archived_at' => null,
    ];
}
}
