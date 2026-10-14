<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {

    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nip', 255)->nullable()->unique();
            $table->string('nidn', 255)->nullable()->unique();
            $table->string('full_name', 255)->nullable();
            $table->string('category', 255)->nullable();
            $table->string('gender', 255)->nullable();
            $table->string('birth_place', 255)->nullable();
            $table->date('birth_date')->nullable();
            $table->string('email', 255)->nullable()->unique();
            $table->string('phone', 255)->nullable();
            $table->text('address')->nullable();
            $table->string('highest_education', 255)->nullable();
            $table->unsignedInteger('unit_id')->nullable(); //jadi unsignedInteger
            $table->foreign('unit_id')->references('id')->on('unit');
            $table->unsignedInteger('supervisor_id')->nullable(); //jadi unsignedInteger
            $table->foreign('supervisor_id')->references('id')->on('employees');
            $table->string('employment_status', 255)->nullable();
            $table->date('join_date')->nullable();
            $table->date('end_date')->nullable();
            $table->string('retirement_status', 255)->nullable();
            $table->integer('retirement_age')->nullable();
            $table->date('retirement_planned_date')->nullable();
            $table->timestamp('retirement_proposed_at')->nullable();
            $table->unsignedBigInteger('retirement_processed_by')->nullable(); //jadi unsignedBigInteger
            $table->foreign('retirement_processed_by')->references('id')->on('users');
            $table->string('retirement_sk_number', 255)->nullable();
            $table->date('retirement_sk_date')->nullable();
            $table->timestamp('retirement_completed_at')->nullable();
            $table->text('retirement_notes')->nullable();

        });
    }

    public function down()
    {
        Schema::dropIfExists('employees');
    }
};
