<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {

    public function up()
    {
        Schema::create('performance_evaluation', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('employee_id')->nullable(); // FK harus unsigned INT agar cocok dengan ID increments() pada employees.
            $table->foreign('employee_id')->references('id')->on('employees');
            $table->string('eval_type', 255)->nullable();
            $table->string('period_label', 255)->nullable();
            $table->string('academic_year', 255)->nullable();
            $table->string('semester', 255)->nullable();
            $table->date('period_start')->nullable();
            $table->date('period_end')->nullable();
            $table->decimal('teaching_credit', 8, 2)->nullable();
            $table->decimal('research_credit', 8, 2)->nullable();
            $table->decimal('service_credit', 8, 2)->nullable();
            $table->decimal('support_credit', 8, 2)->nullable();
            $table->decimal('total_credit', 8, 2)->nullable();
            $table->unsignedInteger('reviewer_id')->nullable(); // FK harus unsigned INT agar cocok dengan ID increments() pada employees.
            $table->foreign('reviewer_id')->references('id')->on('employees');
            $table->string('status', 255)->nullable();
            $table->timestamp('reviewed_at')->nullable();
            $table->decimal('final_score', 8, 2)->nullable();
            $table->string('rating', 255)->nullable();
            $table->integer('version')->nullable();
            $table->boolean('is_current')->nullable();
            $table->text('revision_reason')->nullable();

        });
    }

    public function down()
    {
        Schema::dropIfExists('performance_evaluation');
    }
};
