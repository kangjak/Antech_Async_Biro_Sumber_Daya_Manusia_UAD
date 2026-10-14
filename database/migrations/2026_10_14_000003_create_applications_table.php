<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {

    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('vacancy_id')->nullable(); // FK salah tipe jika signed; increments() menghasilkan unsigned INT.
            $table->foreign('vacancy_id')->references('id')->on('vacancies');
            $table->unsignedInteger('employee_id')->nullable()->unique(); // FK salah tipe jika signed; increments() menghasilkan unsigned INT.
            $table->foreign('employee_id')->references('id')->on('employees');
            $table->string('applicant_name', 255)->nullable();
            $table->string('applicant_email', 255)->nullable();
            $table->string('applicant_phone', 255)->nullable();
            $table->date('birth_date')->nullable();
            $table->string('highest_education', 255)->nullable();
            $table->string('cv_path', 255)->nullable();
            $table->timestamp('applied_at')->nullable();
            $table->decimal('aik_score', 8, 2)->nullable();
            $table->string('current_stage', 255)->nullable();
            $table->string('stage_result', 255)->nullable();
            $table->decimal('stage_score', 8, 2)->nullable();
            $table->unsignedBigInteger('stage_assessed_by')->nullable(); // FK harus unsigned BIGINT agar cocok dengan users.id dari $table->id().
            $table->foreign('stage_assessed_by')->references('id')->on('users');
            $table->timestamp('stage_assessed_at')->nullable();
            $table->text('stage_notes')->nullable();
            $table->string('status', 255)->nullable();
            $table->timestamp('decided_at')->nullable();

        });
    }

    public function down()
    {
        Schema::dropIfExists('applications');
    }
};
