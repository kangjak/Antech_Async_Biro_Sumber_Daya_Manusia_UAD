<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {

    public function up()
    {
        Schema::create('rank_histories', function (Blueprint $table) {
            $table->increments('id')->nullable();
            $table->unsignedInteger('employee_id')->nullable(); // FK harus unsigned INT agar cocok dengan ID increments() pada employees.
            $table->foreign('employee_id')->references('id')->on('employees');
            $table->string('rank_name', 255)->nullable();
            $table->decimal('credit_points', 8, 2)->nullable();
            $table->boolean('is_accelerated')->nullable();
            $table->string('status', 255)->nullable();
            $table->timestamp('submitted_at')->nullable();
            $table->unsignedInteger('approver_id')->nullable(); // FK harus unsigned INT agar cocok dengan ID increments() pada employees.
            $table->foreign('approver_id')->references('id')->on('employees');
            $table->timestamp('decided_at')->nullable();
            $table->date('effective_date')->nullable();
            $table->string('sk_number', 255)->nullable();
            $table->date('sk_date')->nullable();
            $table->text('decision_note')->nullable();
            $table->string('rank_grade', 255)->nullable();
            $table->string('functional_position', 255)->nullable();

        });
    }

    public function down()
    {
        Schema::dropIfExists('rank_histories');
    }
};
