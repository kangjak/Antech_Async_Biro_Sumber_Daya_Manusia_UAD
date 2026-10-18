<?php

namespace Database\Factories;

use App\Models\Employee;
use App\Models\Unit;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Employee>
 */
class EmployeeFactory extends Factory
{
    public function definition(): array
    {
        $category = fake()->randomElement([
            'Dosen',
            'Tenaga Kependidikan',
        ]);

        $unitId = Unit::query()
            ->inRandomOrder()
            ->value('id');

        $birthDate = fake()->dateTimeBetween('-60 years', '-23 years');
        $joinDate = fake()->dateTimeBetween('-20 years', 'now');

        return [
            'nip' => fake()->unique()->numerify('################'),
            'nidn' => $category === 'Dosen'
                ? fake()->unique()->numerify('##########')
                : null,

            'full_name' => fake()->name(),
            'category' => $category,

            'gender' => fake()->randomElement([
                'Laki-laki',
                'Perempuan',
            ]),

            'birth_place' => fake()->city(),
            'birth_date' => $birthDate->format('Y-m-d'),

            'email' => fake()->unique()->safeEmail(),
            'phone' => fake()->numerify('08##########'),
            'address' => fake()->address(),

            'highest_education' => fake()->randomElement([
                'S1',
                'S2',
                'S3',
            ]),

            'unit_id' => $unitId,

            // Diisi null terlebih dahulu agar tidak bergantung
            // pada pegawai lain yang belum dibuat.
            'supervisor_id' => null,

            'employment_status' => 'Aktif',
            'join_date' => $joinDate->format('Y-m-d'),

            'end_date' => null,
            'retirement_status' => null,
            'retirement_age' => null,
            'retirement_planned_date' => null,
            'retirement_proposed_at' => null,
            'retirement_processed_by' => null,
            'retirement_sk_number' => null,
            'retirement_sk_date' => null,
            'retirement_completed_at' => null,
            'retirement_notes' => null,
        ];
    }
}