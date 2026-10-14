<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {

    public function up()
    {
        Schema::create('employee_request', function (Blueprint $table) {
            $table->increments('id')->nullable();
            $table->string('request_kind', 255)->nullable();
            $table->unsignedInteger('employee_id')->nullable(); // FK harus unsigned INT agar cocok dengan ID increments() pada employees.
            $table->foreign('employee_id')->references('id')->on('employees');
            $table->unsignedInteger('request_type_id')->nullable(); // FK harus unsigned INT agar cocok dengan ID increments() pada request_type.
            $table->foreign('request_type_id')->references('id')->on('request_type');
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->integer('total_days')->nullable();
            $table->date('work_date')->nullable();
            $table->time('start_time')->nullable();
            $table->time('end_time')->nullable();
            $table->decimal('total_hours', 8, 2)->nullable();
            $table->string('period_label', 255)->nullable();
            $table->decimal('amount', 8, 2)->nullable();
            $table->text('reason')->nullable();
            $table->string('status', 255)->nullable();
            $table->unsignedInteger('approver_id')->nullable(); // FK harus unsigned INT agar cocok dengan ID increments() pada employees.
            $table->foreign('approver_id')->references('id')->on('employees');
            $table->timestamp('submitted_at')->nullable();
            $table->timestamp('decided_at')->nullable();
            $table->text('decision_note')->nullable();
            $table->integer('version')->nullable();

        });
    }

    public function down()
    {
        Schema::dropIfExists('employee_request');
    }
};
