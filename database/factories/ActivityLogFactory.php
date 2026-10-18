<?php

namespace Database\Factories;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use RuntimeException;

/**
 * @extends Factory<\App\Models\ActivityLog>
 */
class ActivityLogFactory extends Factory
{
    protected static ?array $userIds = null;
    protected static ?array $employeeIds = null;

    public function definition(): array
    {
        // Cache ID agar tidak query berulang kali.
        self::$userIds ??= User::query()->pluck('id')->all();
        self::$employeeIds ??= Employee::query()->pluck('id')->all();

        if (empty(self::$userIds)) {
            throw new RuntimeException(
                'Data User belum tersedia. Buat User terlebih dahulu.'
            );
        }

        if (empty(self::$employeeIds)) {
            throw new RuntimeException(
                'Data Employee belum tersedia. Buat Employee terlebih dahulu.'
            );
        }

        $action = fake()->randomElement([
            'created',
            'updated',
            'approved',
            'rejected',
            'deleted',
        ]);

        $entityType = fake()->randomElement([
            'Employee',
            'Application',
            'EmployeeRequest',
            'Vacancy',
            'PerformanceEvaluation',
        ]);

        return [
            'actor_id' => fake()->randomElement(self::$userIds),

            'action' => $action,

            'entity_type' => $entityType,

            'entity_id' => fake()->randomElement(self::$employeeIds),

            'old_status' => fake()->optional(0.6)->randomElement([
                'Menunggu',
                'Diproses',
                'Aktif',
                'Ditolak',
            ]),

            'new_status' => fake()->randomElement([
                'Aktif',
                'Diproses',
                'Disetujui',
                'Ditolak',
                'Selesai',
            ]),

            'reason' => fake()->sentence(),

            'details' => fake()->sentence(),

            'ip_address' => fake()->ipv4(),

            'created_at' => fake()->dateTimeBetween(
                '-1 year',
                'now'
            ),
        ];
    }
}