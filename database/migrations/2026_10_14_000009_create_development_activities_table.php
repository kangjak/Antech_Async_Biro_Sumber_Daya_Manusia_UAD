<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {

    public function up()
    {
        Schema::create('development_activities', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('employee_id')->nullable(); // FK harus unsigned INT agar cocok dengan ID increments() pada employees.
            $table->foreign('employee_id')->references('id')->on('employees');
            $table->string('activity_type', 255)->nullable();
            $table->string('title', 255)->nullable();
            $table->string('organizer', 255)->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->string('status', 255)->nullable();
            $table->string('degree_level', 255)->nullable();
            $table->string('study_program', 255)->nullable();
            $table->date('expected_end_date')->nullable();
            $table->string('scholarship_name', 255)->nullable();
            $table->string('scholarship_status', 255)->nullable();
            $table->text('mentoring_notes')->nullable();
            $table->string('training_type', 255)->nullable();
            $table->integer('duration_hours')->nullable();
            $table->string('certificate_number', 255)->nullable();
            $table->string('certificate_path', 255)->nullable();

        });
    }

    public function down()
    {
        Schema::dropIfExists('development_activities');
    }
};
