<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nip' => fake()->unique()->numerify('################'),
            'nidn' => fake()->unique()->numerify('##########'),
            'full_name' => fake()->name(),
            'category' => fake()->randomElement(['Dosen', 'Tenaga Kependidikan']),
            'gender' => fake()->randomElement(['Laki-laki', 'Perempuan']),
            'birth_place' => fake()->city(),
            'birth_date' => fake()->date(),
            'email' => fake()->unique()->safeEmail(),
            'phone' => fake()->phoneNumber(),
            'address' => fake()->address(),
            'highest_education' => fake()->randomElement(['S1', 'S2', 'S3']),
            'unit_id' => \App\Models\Unit::query()->value('id'),
            'supervisor_id' => null,
            'employment_status' => 'Aktif',
            'join_date' => fake()->date(),
        ];
    }
}
