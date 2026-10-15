<?php

namespace Database\Factories;

use App\Models\RequestType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<RequestType>
 */
class RequestTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->randomElement([
        'Cuti Tahunan',
        'Cuti Sakit',
        'Izin Pribadi',
        'Tugas Dinas',
        ]);
        return [
            'kind' => fake()->randomElement(['Cuti', 'Izin', 'Dinas']),
            'code' => fake()->unique()->bothify('REQ-####'),
            'name' => $name,
            'applies_to' => 'Pegawai',
            'annual_quota' => fake()->numberBetween(0, 12),
            'requires_doctorate' => false,
            'period_type' => 'Tahunan',
            'description' => "Data dummy untuk {$name}.",
            'is_active' => true,
        ];
    }
}
