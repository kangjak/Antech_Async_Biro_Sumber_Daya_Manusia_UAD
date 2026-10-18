<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Unit;
use App\Models\RequestType;
use App\Models\Employee;
use App\Models\Vacancy;
use App\Models\Application;
use App\Models\LeaveBalance;
use App\Models\EmployeeRequest;
use App\Models\WorkSchedule;
use App\Models\RankHistory;
use App\Models\DevelopmentActivity;
use App\Models\BpjsMembership;
use App\Models\PerformanceEvaluation;
use App\Models\PerformanceItem;
use App\Models\ActivityLog;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Data referensi
        User::factory(20_000)->create();
        Unit::factory(100)->create();
        RequestType::factory(90)->create();

        // 2. Data pegawai
        Employee::factory(10_000)->create();
        Vacancy::factory(500)->create();
        WorkSchedule::factory(100)->create();

        // 3. Data transaksi
        Application::factory(30_000)->create();
        LeaveBalance::factory(10_000)->create();
        EmployeeRequest::factory(30_000)->create();

        // 4. Riwayat kepegawaian
        RankHistory::factory(10_000)->create();
        DevelopmentActivity::factory(20_000)->create();
        BpjsMembership::factory(20_000)->create();

        // 5. Evaluasi kinerja
        PerformanceEvaluation::factory(20_000)->create();
        PerformanceItem::factory(50_000)->create();

        // 6. Log aktivitas
        ActivityLog::factory(100_000)->create();
    }
}