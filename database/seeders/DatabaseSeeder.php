<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // untuk manggil facotry

        \App\Models\User::factory(20)->create();
        \App\Models\Unit::factory(10)->create();
        \App\Models\RequestType::factory(10)->create();

        \App\Models\Employee::factory(1000)->create();
        \App\Models\Vacancy::factory(150)->create();

        \App\Models\Application::factory(1000)->create();
        \App\Models\LeaveBalance::factory(1000)->create();
        \App\Models\EmployeeRequest::factory(1000)->create();
        \App\Models\WorkSchedule::factory(100)->create();
        \App\Models\RankHistory::factory(1000)->create();
        \App\Models\DevelopmentActivity::factory(1000)->create();
        \App\Models\BpjsMembership::factory(1000)->create();

        \App\Models\PerformanceEvaluation::factory(1000)->create();
        \App\Models\PerformanceItem::factory(5000)->create();
        \App\Models\ActivityLog::factory(5000)->create();
    }
}
