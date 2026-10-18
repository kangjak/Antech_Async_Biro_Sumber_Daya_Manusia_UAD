<?php

namespace Database\Factories;

use App\Models\BpjsMembership;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Employee;

/**
 * @extends Factory<BpjsMembership>
 */
class BpjsMembershipFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
{
    $employeeId = \App\Models\Employee::query()
        ->inRandomOrder()
        ->value('id');

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
