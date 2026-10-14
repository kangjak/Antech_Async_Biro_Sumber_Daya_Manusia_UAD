<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {

    public function up()
    {
        Schema::create('leave_balances', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('employee_id')->nullable(); // FK harus unsigned INT agar cocok dengan ID increments() pada employees.
            $table->foreign('employee_id')->references('id')->on('employees');
            $table->unsignedInteger('request_type_id')->nullable(); // FK harus unsigned INT agar cocok dengan ID increments() pada request_type.
            $table->foreign('request_type_id')->references('id')->on('request_type');
            $table->integer('year')->nullable();
            $table->integer('quota_days')->nullable();
            $table->integer('used_days')->nullable();
            $table->integer('version')->nullable();

        });
    }

    public function down()
    {
        Schema::dropIfExists('leave_balances');
    }
};
