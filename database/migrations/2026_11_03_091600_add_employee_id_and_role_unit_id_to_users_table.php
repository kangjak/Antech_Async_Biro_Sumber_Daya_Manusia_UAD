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
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedInteger('employee_id')->nullable()->unique()->after('id');
            $table->foreign('employee_id')->references('id')->on('employees')->nullOnDelete();

            $table->unsignedInteger('role_unit_id')->nullable()->after('employee_id');
            $table->foreign('role_unit_id')->references('id')->on('unit')->nullOnDelete();

            $table->string('role_name')->nullable()->after('role_unit_id');
            $table->boolean('is_active')->default(true)->after('role_name');
            $table->timestamp('last_login_at')->nullable()->after('is_active');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['employee_id']);
            $table->dropForeign(['role_unit_id']);
            $table->dropColumn([
                'employee_id',
                'role_unit_id',
                'role_name',
                'is_active',
                'last_login_at',
            ]);
        });
    }
};
