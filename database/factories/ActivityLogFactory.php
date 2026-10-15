<?php

namespace Database\Factories;

use App\Models\ActivityLog;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<ActivityLog>
 */
class ActivityLogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'actor_id' => \App\Models\User::query()->value('id'),
            'action' => fake()->randomElement(['created', 'updated', 'approved']),
            'entity_type' => 'Employee',
            'entity_id' => \App\Models\Employee::query()->value('id'),
            'old_status' => null,
            'new_status' => 'Aktif',
            'reason' => fake()->sentence(),
            'details' => fake()->sentence(),
            'ip_address' => fake()->ipv4(),
            'created_at' => fake()->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
