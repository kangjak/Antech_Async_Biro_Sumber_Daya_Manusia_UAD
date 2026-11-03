<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('activity_logs', function (Blueprint $table) {
            $table->index(['entity_type', 'entity_id']);
            $table->index(['created_at', 'actor_id']);
        });

        Schema::table('employee_request', function (Blueprint $table) {
            $table->index(['status', 'employee_id']);
        });

        Schema::table('applications', function (Blueprint $table) {
            $table->index(['status', 'vacancy_id']);
        });

        Schema::table('leave_balances', function (Blueprint $table) {
            $table->index(['year', 'employee_id', 'request_type_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('activity_logs', function (Blueprint $table) {
            $table->dropIndex(['entity_type', 'entity_id']);
            $table->dropIndex(['created_at', 'actor_id']);
        });

        Schema::table('employee_request', function (Blueprint $table) {
            $table->dropIndex(['status', 'employee_id']);
        });

        Schema::table('applications', function (Blueprint $table) {
            $table->dropIndex(['status', 'vacancy_id']);
        });

        Schema::table('leave_balances', function (Blueprint $table) {
            $table->dropIndex(['year', 'employee_id', 'request_type_id']);
        });
    }
};
