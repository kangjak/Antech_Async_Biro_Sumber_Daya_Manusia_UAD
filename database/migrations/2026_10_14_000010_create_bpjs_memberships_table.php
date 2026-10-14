<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {

    public function up()
    {
        Schema::create('bpjs_memberships', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('employee_id')->nullable(); // FK harus unsigned INT agar cocok dengan ID increments() pada employees.
            $table->foreign('employee_id')->references('id')->on('employees');
            $table->string('bpjs_type', 255)->nullable();
            $table->string('membership_number', 255)->nullable();
            $table->date('registered_date')->nullable();
            $table->string('status', 255)->nullable();
            $table->date('end_date')->nullable();
            $table->timestamp('archived_at')->nullable();

        });
    }

    public function down()
    {
        Schema::dropIfExists('bpjs_memberships');
    }
};
