<?php

namespace Database\Factories;

use App\Models\BpjsMembership;
use Illuminate\Database\Eloquent\Factories\Factory;

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
        return [
            'employee_id' => \App\Models\Employee::query()->inRandomOrder()->value('id'),
            'bpjs_type' => fake()->randomElement(['Kesehatan', 'Ketenagakerjaan']),
            'membership_number' => fake()->unique()->numerify('############'),
            'registered_date' => fake()->dateTimeBetween('-5 years', 'now')->format('Y-m-d'),
            'status' => 'Aktif',
            'end_date' => null,
            'archived_at' => null,
        ];
    }
}
